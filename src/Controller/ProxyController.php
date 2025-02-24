<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Controller;

use Exception;
use JsonException;
use OxidEsales\Eshop\Application\Component\UserComponent;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Application\Model\Address;
use OxidEsales\Eshop\Application\Model\DeliverySetList;
use OxidEsales\Eshop\Core\Exception\ArticleInputException;
use OxidEsales\Eshop\Core\Exception\NoArticleException;
use OxidEsales\Eshop\Core\Exception\OutOfStockException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidSolutionCatalysts\PayPal\Core\Config;
use OxidSolutionCatalysts\PayPal\Core\Constants;
use OxidSolutionCatalysts\PayPal\Core\OrderRequestFactory;
use OxidSolutionCatalysts\PayPal\Core\PayPalDefinitions;
use OxidSolutionCatalysts\PayPal\Core\PayPalSession;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;
use OxidSolutionCatalysts\PayPal\Core\Utils\PayPalAddressResponseToOxidAddress;
use OxidSolutionCatalysts\PayPal\Service\Logger;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;
use OxidSolutionCatalysts\PayPal\Service\Payment as PaymentService;
use OxidSolutionCatalysts\PayPal\Service\UserRepository;
use OxidSolutionCatalysts\PayPal\Service\PayPalUrlService;
use OxidSolutionCatalysts\PayPal\Traits\JsonTrait;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\AddressPortable;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\Order as PayPalApiOrder;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\Payer;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\PurchaseUnitRequest;

/**
 * Server side interface for PayPal smart buttons.
 */
class ProxyController extends FrontendController
{
    use JsonTrait;
    use ServiceContainer;

    public function createOrder()
    {
        if (PayPalSession::isPayPalExpressOrderActive()) {
            //TODO: improve
            //  $this->outputJson(['ERROR' => 'PayPal session already started.']);
        }

        $config = Registry::getConfig();
        $this->addToBasket();
        $paymentId = Registry::getRequest()->getRequestParameter('paymentid');
        if ($paymentId === PayPalDefinitions::APPLEPAY_PAYPAL_PAYMENT_ID) {
            $this->setPayPalPaymentMethod($paymentId);
        } else {
            $this->setPayPalPaymentMethod();
        }
        $session = Registry::getSession();
        $basket = $session->getBasket();
        $defaultShippingPriceExpress = (double) $config->getConfigParam('oscPayPalDefaultShippingPriceExpress');
        $calculateDelCostIfNotLoggedIn = (bool) $config->getConfigParam('blCalculateDelCostIfNotLoggedIn');
        $isDeliverySet = (bool) $session->getVariable('sShipSet');
        if ($basket && $defaultShippingPriceExpress && !$calculateDelCostIfNotLoggedIn && !$isDeliverySet) {
            $basket->addShippingPriceForExpress($defaultShippingPriceExpress);
        }
        if ($basket->getItemsCount() === 0) {
            $this->outputJson(['ERROR' => 'No Article in the Basket']);
        }

        $response = $this->getServiceFromContainer(PaymentService::class)->doCreatePayPalOrder(
            $basket,
            OrderRequest::INTENT_CAPTURE,
            OrderRequestFactory::USER_ACTION_CONTINUE,
            null,
            '',
            '',
            Constants::PAYPAL_PARTNER_ATTRIBUTION_ID_PPCP,
            null,
            null,
            false
        );

        if ($response->id) {
            PayPalSession::storePayPalOrderId($response->id);
        }

        $this->outputJson($response);
    }

    /**
     * @throws JsonException
     */
    public function createGooglePayOrder()
    {
        $data = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);

        $shippingAddress = new AddressPortable();
        $shippingAddress->address_line_1 = $data['shippingAddress']['address1'] ?? '';
        $shippingAddress->address_line_2 = $data['shippingAddress']['address2'] ?? '';
        $shippingAddress->address_line_3 = $data['shippingAddress']['address3'] ?? '';
        $shippingAddress->postal_code    = $data['shippingAddress']['postalCode'] ?? '';
        $shippingAddress->admin_area_2   = $data['shippingAddress']['locality'] ?? '';
        $shippingAddress->admin_area_1   = $data['shippingAddress']['administrativeArea'] ?? '';
        $shippingAddress->country_code   = $data['shippingAddress']['countryCode'] ?? '';

        if (PayPalSession::isPayPalExpressOrderActive()) {
            //TODO: improve
            $this->outputJson(
                [
                'ERROR' => 'PayPal session already started.' . PayPalSession::isPayPalExpressOrderActive()
                ]
            );
        }
        $paymentId = Registry::getSession()->getVariable('paymentid');

        $this->addToBasket();
        $this->setPayPalPaymentMethod($paymentId);
        $basket = Registry::getSession()->getBasket();

        if ($basket->getItemsCount() === 0) {
            $this->outputJson(['ERROR' => 'No Article in the Basket']);
        }

        /**
         * @var PayPalUrlService $payPalUrlService
        */
        $payPalUrlService = $this->getServiceFromContainer(PayPalUrlService::class);
        $isLoggedIn = false;
        $nonGuestAccountDetected = false;
        $response = $this->getServiceFromContainer(PaymentService::class)->doCreatePayPalOrder(
            $basket,
            OrderRequest::INTENT_CAPTURE,
            OrderRequestFactory::USER_ACTION_CONTINUE,
            null,
            '',
            '',
            Constants::PAYPAL_PARTNER_ATTRIBUTION_ID_PPCP,
            $payPalUrlService->getReturnUrl(),
            $payPalUrlService->getCancelUrl(),
            false
        );

        if ($response->id) {
            PayPalSession::storePayPalOrderId($response->id);
        }

        if (!$this->getUser()) {
            $purchaseUnitRequest = new PurchaseUnitRequest();
            $purchaseUnitRequest->shipping->address = $shippingAddress;
            $purchaseUnitRequest->shipping->name->full_name = $data['shippingAddress']['name'] ?? '';

            $response->purchase_units = [$purchaseUnitRequest];

            $response->payer = new Payer();
            $response->payer->email_address = $data['email'];
            $response->payer->phone->phone_number->national_number = $data['shippingAddress']['phoneNumber'] ?? '';

            $userRepository = $this->getServiceFromContainer(UserRepository::class);
            $paypalEmail = $data['email'];

            if ($userRepository->userAccountExists($paypalEmail)) {
                //got a non-guest account, so either we log in or redirect customer to login step
                $isLoggedIn = $this->handleUserLogin($response);
                $nonGuestAccountDetected = true;
            } else {
                //we need to use a guest account
                $userComponent = oxNew(UserComponent::class);
                $userComponent->createPayPalGuestUser($response);
            }
        }

        if ($user = $this->getUser()) {
            /** @var array $userInvoiceAddress */
            $userInvoiceAddress = $user->getInvoiceAddress();
            // add PayPal-Address as Delivery-Address
            if (($response !== null) && !empty($response->purchase_units[0]->shipping)) {
                $response->purchase_units[0]->shipping->address = $shippingAddress;
                $response->purchase_units[0]->shipping->name->full_name = $data['shippingAddress']['name'] ?? '';
                $deliveryAddress = PayPalAddressResponseToOxidAddress::mapUserDeliveryAddress($response);
                if ($deliveryAddress['oxaddress__oxfname'] !== '' && $deliveryAddress['oxaddress__oxstreet'] !== '') {
                    try {
                        $user->changeUserData(
                            $user->oxuser__oxusername->value,
                            '',
                            '',
                            $userInvoiceAddress,
                            $deliveryAddress
                        );

                        // use a deliveryaddress in oxid-checkout
                        Registry::getSession()->setVariable('blshowshipaddress', false);

                        $this->setPayPalPaymentMethod();
                    } catch (StandardException $exception) {
                        Registry::getUtilsView()->addErrorToDisplay($exception);
                        $response->status = 'ERROR';
                        PayPalSession::unsetPayPalOrderId();
                        Registry::getSession()->getBasket()->setPayment(null);
                    }
                }
            }
        } elseif ($nonGuestAccountDetected && !$isLoggedIn) {
            // PPExpress is actual no possible so we switch to PP-Standard
            $this->setPayPalPaymentMethod(PayPalDefinitions::STANDARD_PAYPAL_PAYMENT_ID);
        } else {
            //TODO: we might end up in order step redirecting to start page without showing a message
            // if we have no user, we stop the process
            $response->status = 'ERROR';
            PayPalSession::unsetPayPalOrderId();
            Registry::getSession()->getBasket()->setPayment(null);
        }
        $this->outputJson($response);
    }


    /**
     * @throws JsonException
     */
    public function approveOrder()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $orderId = (string) Registry::getRequest()->getRequestEscapedParameter('orderID');
        $sessionOrderId = PayPalSession::getCheckoutOrderId();
        if (!empty($data['orderID']) && $orderId === '') {
            $orderId = $data['orderID'];
        }
        if (!$orderId || ($orderId !== $sessionOrderId)) {
            //TODO: improve
            $this->outputJson(['ERROR' => 'OrderId not found in PayPal session.']);
        }

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $service = $serviceFactory->getOrderService();
        $nonGuestAccountDetected = false;
        $isLoggedIn = false;

        try {
            $response = $service->showOrderDetails(
                $orderId,
                '',
                Constants::PAYPAL_PARTNER_ATTRIBUTION_ID_PPCP
            );
        } catch (Exception $exception) {
            /** @var Logger $logger */
            $logger = $this->getServiceFromContainer(Logger::class);
            $logger->log('error', "Error on order capture call.", [$exception]);
        }

        if (!$this->getUser() && $response) {
            $userRepository = $this->getServiceFromContainer(UserRepository::class);
            $paypalEmail = (string) $response->payer->email_address;

            if ($userRepository->userAccountExists($paypalEmail)) {
                //got a non-guest account, so either we log in or redirect customer to login step
                $isLoggedIn = $this->handleUserLogin($response);
                $nonGuestAccountDetected = true;
            } else {
                //we need to use a guest account
                $userComponent = oxNew(UserComponent::class);
                $userComponent->createPayPalGuestUser($response);
            }
        }

        if ($user = $this->getUser()) {
            /** @var array $userInvoiceAddress */
            $userInvoiceAddress = $user->getInvoiceAddress();
            // add PayPal-Address as Delivery-Address
            $deliveryAddress = PayPalAddressResponseToOxidAddress::mapUserDeliveryAddress($response);
            try {
                $user->changeUserData(
                    $user->oxuser__oxusername->value,
                    '',
                    '',
                    $userInvoiceAddress,
                    $deliveryAddress
                );
                $paymentId = Registry::getSession()->getVariable('paymentid');
                // use a deliveryaddress in oxid-checkout
                Registry::getSession()->setVariable('blshowshipaddress', false);
                if ($paymentId === PayPalDefinitions::APPLEPAY_PAYPAL_PAYMENT_ID) {
                    $this->setPayPalPaymentMethod($paymentId);
                } else {
                    $this->setPayPalPaymentMethod();
                }
                if ($paymentId === PayPalDefinitions::GOOGLEPAY_PAYPAL_PAYMENT_ID) {
                    $this->setPayPalPaymentMethod($paymentId);
                } else {
                    $this->setPayPalPaymentMethod();
                }
            } catch (StandardException $exception) {
                Registry::getUtilsView()->addErrorToDisplay($exception);
                $response->status = 'ERROR';
                PayPalSession::unsetPayPalOrderId();
                Registry::getSession()->getBasket()->setPayment(null);
            }
        } elseif ($nonGuestAccountDetected && !$isLoggedIn) {
            // PPExpress is actual no possible so we switch to PP-Standard
            $this->setPayPalPaymentMethod(PayPalDefinitions::STANDARD_PAYPAL_PAYMENT_ID);
        } else {
            //TODO: we might end up in order step redirecting to start page without showing a message
            // if we have no user, we stop the process
            $response->status = 'ERROR';
            PayPalSession::unsetPayPalOrderId();
            Registry::getSession()->getBasket()->setPayment(null);
        }
        $this->outputJson($response);
    }

    public function cancelPayPalPayment()
    {
        PayPalSession::unsetPayPalSession();
        Registry::getSession()->getBasket()->deleteBasket();
        $redirect = Registry::getRequest()->getRequestParameter('redirect');
        if ($redirect === "1") {
            Registry::getUtils()->redirect(Registry::getConfig()->getShopSecureHomeURL() . 'cl=payment', false, 301);
        }
        exit;
    }

    protected function addToBasket($qty = 1): void
    {
        $basket = Registry::getSession()->getBasket();
        $utilsView = Registry::getUtilsView();
        $aSel = Registry::getRequest()->getRequestParameter('sel');
        if ($aid = (string)Registry::getRequest()->getRequestEscapedParameter('aid')) {
            try {
                $basket->addToBasket($aid, $qty, $aSel);
                // Remove flag of "new item added" to not show "Item added" popup when returning to checkout from paypal
                $basket->isNewItemAdded();
            } catch (OutOfStockException $exception) {
                $utilsView->addErrorToDisplay($exception);
            } catch (ArticleInputException $exception) {
                $utilsView->addErrorToDisplay($exception);
            } catch (NoArticleException $exception) {
                $utilsView->addErrorToDisplay($exception);
            }
            $basket->calculateBasket(false);
        }
    }
    public function setPayPalPaymentMethod($defaultPayPalPaymentId = PayPalDefinitions::EXPRESS_PAYPAL_PAYMENT_ID): void
    {
        $session = Registry::getSession();
        $basket = $session->getBasket();
        $user = null;

        if ($activeUser = $this->getUser()) {
            $user = $activeUser;
        }

        $requestedPayPalPaymentId = $this->getRequestedPayPalPaymentId($defaultPayPalPaymentId);
        if ($session->getVariable('paymentid') !== $requestedPayPalPaymentId) {
            $basket->setPayment($requestedPayPalPaymentId);
            $session->setVariable('paymentid', $requestedPayPalPaymentId);
        }
        $this->getActiveShippingSetId($session, $user, $basket);
    }

    private function getActiveShippingSetId($session, $user, $basket): void
    {
        /** @psalm-suppress InvalidArgument */
        [, $shippingSetId,] =
            Registry::get(DeliverySetList::class)->getDeliverySetData('', $user, $basket);

        if ($shippingSetId) {
            $basket->setShipping($shippingSetId);
            $session->setVariable('sShipSet', $shippingSetId);
        }
    }

    /**
     * Tries to fetch user delivery country ID
     *
     * @return string
     */
    protected function getDeliveryCountryId()
    {
        $config = Registry::getConfig();
        $user = $this->getUser();

        if (!$user) {
            $homeCountry = $config->getConfigParam('aHomeCountry');
            if (is_array($homeCountry)) {
                $countryId = current($homeCountry);
            }
        } else {
            if ($delCountryId = $config->getGlobalParameter('delcountryid')) {
                $countryId = $delCountryId;
            } elseif ($addressId = Registry::getSession()->getVariable('deladrid')) {
                $deliveryAddress = oxNew(Address::class);
                if ($deliveryAddress->load($addressId)) {
                    $countryId = $deliveryAddress->oxaddress__oxcountryid->value;
                }
            }

            if (!$countryId) {
                $countryId = $user->oxuser__oxcountryid->value;
            }
        }
        return $countryId;
    }

    protected function handleUserLogin(PayPalApiOrder $apiOrder): bool
    {
        $paypalConfig = oxNew(Config::class);
        $userComponent = oxNew(UserComponent::class);
        $isLoggedIn = false;

        if ($paypalConfig->loginWithPayPalEMail()) {
            $userComponent->loginPayPalCustomer($apiOrder);
            $isLoggedIn = true;
        } else {
            //NOTE: ProxyController must not redirect from create Order/approvaOrder methods,
            //      it has to show a json response in all cases.
            //tell order controller to redirect to checkout login
            Registry::getSession()->setVariable('oscpaypal_payment_redirect', true);
        }

        return $isLoggedIn;
    }

    protected function getRequestedPayPalPaymentId(
        $defaultPayPalPaymentId = PayPalDefinitions::EXPRESS_PAYPAL_PAYMENT_ID
    ): string {
        $paymentId = (string) Registry::getRequest()->getRequestEscapedParameter('paymentid');
        return PayPalDefinitions::isPayPalPayment($paymentId) ?
            $paymentId :
            $defaultPayPalPaymentId;
    }

    public function getPaymentRequestLines()
    {
        $moduleSettings = $this->getServiceFromContainer(ModuleSettings::class);
        try {
            $basket = Registry::getSession()->getBasket();
            if ($basket->getItemsCount() === 0) {
                throw new Exception('No Article in the Basket');
            }

            $deliveryCost = $basket->getDeliveryCost();
            if (!$deliveryCost) {
                throw new Exception('Delivery cost calculation failed');
            }
            $deliveryBruttoPrice = $deliveryCost->getBruttoPrice();

            $sVat = 0.0;
            foreach ($basket->getProductVats(false) as $VATitem) {
                $sVat += $VATitem;
            }

            $paymentRequest = [
                'total' => [
                    'label' => $moduleSettings->getShopName(),
                    'amount' => $basket->getPriceForPayment(),
                    'type' => 'final'
                ],
                'lineItems' => [
                    [
                        'label' => 'Subtotal',
                        'amount' => number_format((double) $basket->getBruttoSum(), 2, '.', ''),
                        'type' => 'final'
                    ],
                    [
                        'label' => 'Tax',
                        'amount' => number_format((double) $sVat, 2, '.', ''),
                        'type' => 'final'
                    ],
                    [
                        'label' => 'Shipping',
                        'amount' => number_format($deliveryBruttoPrice, 2, '.', ''),
                        'type' => 'final'
                    ]
                ]
            ];
            $this->outputJson($paymentRequest);
        } catch (Exception $e) {
            $this->outputJson(['ERROR' => $e->getMessage()]);
        }
    }
    public function createApplepayOrder()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $shippingData = $data['data'];
        $shippingAddress = new AddressPortable();
        $shippingAddress->address_line_1 = $shippingData['shippingContact']['addressLines'][0] ?? '';
        $shippingAddress->address_line_2 = $shippingData['shippingContact']['emailAddress'] ?? '';
        $shippingAddress->address_line_3 = $shippingData['shippingContact']['address3'] ?? '';
        $shippingAddress->postal_code    = $shippingData['shippingContact']['postalCode'] ?? '';
        $shippingAddress->admin_area_2   = $shippingData['shippingContact']['locality'] ?? '';
        $shippingAddress->admin_area_1   = $shippingData['shippingContact']['administrativeArea'] ?? '';
        $shippingAddress->country_code   = $shippingData['shippingContact']['countryCode'] ?? '';
        if (PayPalSession::isPayPalExpressOrderActive()) {
            //TODO: improve
        }
        $paymentId = Registry::getSession()->getVariable('paymentid');
        $nonGuestAccountDetected = false;
        $isLoggedIn = false;

        $this->addToBasket();
        $this->setPayPalPaymentMethod($paymentId);
        $basket = Registry::getSession()->getBasket();

        if ($basket->getItemsCount() === 0) {
            $this->outputJson(['ERROR' => 'No Article in the Basket']);
        }

        $response = $this->getServiceFromContainer(PaymentService::class)->doCreatePayPalOrder(
            $basket,
            OrderRequest::INTENT_CAPTURE,
            OrderRequestFactory::USER_ACTION_CONTINUE,
            null,
            '',
            '',
            Constants::PAYPAL_PARTNER_ATTRIBUTION_ID_PPCP,
            null,
            null,
            false
        );
        if ($response->id) {
            PayPalSession::storePayPalOrderId($response->id);
        }

        if (!$this->getUser()) {
            $purchaseUnitRequest = new PurchaseUnitRequest();
            $purchaseUnitRequest->shipping->address = $shippingAddress;
            $purchaseUnitRequest->shipping->name->full_name = $shippingData['shippingContact']['name'] ?? '';

            $response->purchase_units = [$purchaseUnitRequest];

            $response->payer = new Payer();
            $response->payer->email_address = $data['email'];
            $response->payer->phone->phone_number->national_number =
                $shippingData['shippingContact']['phoneNumber'] ?? '';

            $userRepository = $this->getServiceFromContainer(UserRepository::class);
            $paypalEmail = $data['email'];

            $nonGuestAccountDetected = false;
            if ($userRepository->userAccountExists($paypalEmail)) {
                //got a non-guest account, so either we log in or redirect customer to login step
                $isLoggedIn = $this->handleUserLogin($response);
                $nonGuestAccountDetected = true;
            } else {
                //we need to use a guest account
                $userComponent = oxNew(UserComponent::class);
                $userComponent->createPayPalGuestUser($response);
            }
        }

        if ($user = $this->getUser()) {
            /** @var array $userInvoiceAddress */
            $userInvoiceAddress = $user->getInvoiceAddress();

            // add PayPal-Address as Delivery-Address
            if (($response !== null) && !empty($response->purchase_units[0]->shipping)) {
                $response->purchase_units[0]->shipping->address = $shippingAddress;
                $response->purchase_units[0]->shipping->name->full_name =
                    $shippingData['shippingContact']['name'] ?? '';
                $deliveryAddress = PayPalAddressResponseToOxidAddress::mapUserDeliveryAddress($response);
                if (
                    $deliveryAddress['oxaddress__oxfname'] !== ''
                    && $deliveryAddress['oxaddress__oxstreet'] !== ''
                ) {
                    try {
                        $user->changeUserData(
                            $user->oxuser__oxusername->value,
                            '',
                            '',
                            $userInvoiceAddress,
                            $deliveryAddress
                        );

                        // use a deliveryaddress in oxid-checkout
                        Registry::getSession()->setVariable('blshowshipaddress', false);

                        $this->setPayPalPaymentMethod($paymentId);
                    } catch (StandardException $exception) {
                     //   Registry::getUtilsView()->addErrorToDisplay($exception);
                       // $response->status = 'ERROR';
                   //     PayPalSession::unsetPayPalOrderId();
                        Registry::getSession()->getBasket()->setPayment(null);
                    }
                }
            }
        } elseif ($nonGuestAccountDetected && !$isLoggedIn) {
            // PPExpress is actual no possible so we switch to PP-Standard
            $this->setPayPalPaymentMethod(PayPalDefinitions::STANDARD_PAYPAL_PAYMENT_ID);
        } else {
            //TODO: we might end up in order step redirecting to start page without showing a message
            // if we have no user, we stop the process
       ////     $response->status = 'ERROR';
       //     PayPalSession::unsetPayPalOrderId();
          //  Registry::getSession()->getBasket()->setPayment(null);
        }
        $this->outputJson($response);
    }
}
