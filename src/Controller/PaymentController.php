<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Controller;

use OxidEsales\Eshop\Core\Registry;
use OxidSolutionCatalysts\PayPal\Core\PayPalSession;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;
use OxidSolutionCatalysts\PayPal\Exception\PayPalException;
use OxidSolutionCatalysts\PayPal\Service\Payment as PaymentService;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;
use OxidSolutionCatalysts\PayPal\Core\PayPalDefinitions;
use OxidSolutionCatalysts\PayPal\Service\UserRepository;

class PaymentController extends PaymentController_parent
{
    use ServiceContainer;

    public function render()
    {
        $lang = Registry::getLang();

        $paymentService = $this->getServiceFromContainer(PaymentService::class);
        if ($paymentService->isOrderExecutionInProgress()) {
            //order execution is already in progress
            Registry::getUtils()->redirect(
                Registry::getConfig()->getShopSecureHomeUrl() . 'cl=order',
                true
            );
        }

        if (
            $paymentService->getSessionPaymentId() === PayPalDefinitions::STANDARD_PAYPAL_PAYMENT_ID ||
            $paymentService->getSessionPaymentId() === PayPalDefinitions::PAYLATER_PAYPAL_PAYMENT_ID
        ) {
            $paymentService->removeTemporaryOrder();
        }

        $user = $this->getUser();

        if ($user) {
            $isVaultingPossible = false;
            $moduleSettings = $this->getServiceFromContainer(ModuleSettings::class);
            if ($moduleSettings->getIsVaultingActive() && $user->getFieldData('oxpassword')) {
                $isVaultingPossible = true;
            }

            $this->addTplParam('oscpaypal_isVaultingPossible', $isVaultingPossible);

            if (
                $isVaultingPossible &&
                ($paypalCustomerId = $user->getFieldData("oscpaypalcustomerid"))
            ) {
                $vaultingService = Registry::get(ServiceFactory::class)->getVaultingService();
                $vaultedPaymentTokens = $vaultingService->getVaultPaymentTokens($paypalCustomerId)["payment_tokens"];
                if ($vaultedPaymentTokens) {
                    $vaultedPaymentSources = [];
                    $uniquePaypalVaultedPaymentSources = [];
                    foreach ($vaultedPaymentTokens as $vaultedPaymentToken) {
                        foreach ($vaultedPaymentToken["payment_source"] as $paymentType => $paymentSource) {
                            if ($paymentType === "card" && $moduleSettings->isVaultingAllowedForACDC()) {
                                $string = $lang->translateString("OSC_PAYPAL_CARD_ENDING_IN");
                                $vaultedPaymentSources[$paymentType][] = $paymentSource["brand"] . " " .
                                    $string . $paymentSource["last_digits"];
                            } elseif ($paymentType === "paypal" && $moduleSettings->isVaultingAllowedForPayPal()) {
                                $string = $lang->translateString("OSC_PAYPAL_CARD_PAYPAL_PAYMENT");

                                $email = $paymentSource["email_address"];
                                $payer_id = $paymentSource["payer_id"];

                                if(!isset($uniquePaypalVaultedPaymentSources[$email])) {
                                    $uniquePaypalVaultedPaymentSources[$email] = [];
                                }

                                if( in_array($payer_id, $uniquePaypalVaultedPaymentSources[$email])) {
                                    continue;
                                }

                                $uniquePaypalVaultedPaymentSources[$email][] = $payer_id;
                                $vaultedPaymentSources[$paymentType][] =
                                    $string . " " . $email;
                            }
                        }
                    }

                    $this->addTplParam("vaultedPaymentSources", $vaultedPaymentSources);
                }
            }
        }

        //reset vaulting session var
        Registry::getSession()->deleteVariable("selectedVaultPaymentSourceIndex");

        return parent::render();
    }

    public function getPayPalPuiFraudnetCmId(): string
    {

        if (!($cmId = PayPalSession::getPayPalPuiCmId())) {
            $cmId = Registry::getUtilsObject()->generateUId();
            PayPalSession::storePayPalPuiCmId($cmId);
        }
        return $cmId;
    }

    /**
     * Template variable getter. Returns paymentlist
     *
     * @return array<array-key, mixed>|object
     */
    public function getPaymentList()
    {
        $paymentList = parent::getPaymentList();
        $payPalDefinitions = PayPalDefinitions::getPayPalDefinitions();
        $actShopCurrency = Registry::getConfig()->getActShopCurrencyObject();
        $userRepository = $this->getServiceFromContainer(UserRepository::class);
        $userCountryIso = $userRepository->getUserCountryIso();

        $paymentListRaw = $paymentList;
        $paymentList = [];
        $payPalHealth = $this->getServiceFromContainer(ModuleSettings::class)->checkHealth();
        $basket = Registry::getSession()->getBasket();
        $isCalculationModeNetto = $basket ? $basket->isCalculationModeNetto() : false;

        /*
         * check:
         * - all none PP-Payments
         * - payPalHealth
         * - deprecated payment method
         * - currency
         * - country
         * - netto-mode
         */

        foreach ($paymentListRaw as $key => $payment) {
            if (
                !isset($payPalDefinitions[$key]) ||
                (
                    $payPalHealth &&
                    //dont add payment that is deprecated
                    ( !PayPalDefinitions::isDeprecatedPayment($payment->getId()) ) &&
                    (
                        empty($payPalDefinitions[$key]['currencies']) ||
                        in_array($actShopCurrency->name, $payPalDefinitions[$key]['currencies'], true)
                    ) &&
                    (
                        empty($payPalDefinitions[$key]['countries']) ||
                        in_array($userCountryIso, $payPalDefinitions[$key]['countries'], true)
                    ) &&
                    (
                        $payPalDefinitions[$key]['onlybrutto'] === false ||
                        (
                            !$isCalculationModeNetto
                        )
                    )
                )
            ) {
                $paymentList[$key] = $payment;
            }
        }

        // check ACDC Eligibility
        if (!$this->getServiceFromContainer(ModuleSettings::class)->isAcdcEligibility()) {
            unset($paymentList[PayPalDefinitions::ACDC_PAYPAL_PAYMENT_ID]);
        }

        // check Pui Eligibility
        if (!$this->getServiceFromContainer(ModuleSettings::class)->isPuiEligibility()) {
            unset($paymentList[PayPalDefinitions::PUI_PAYPAL_PAYMENT_ID]);
        }

        return $paymentList;
    }

    /**
     * @inheritDoc
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @return  mixed
     * @throws PayPalException
     */
    public function validatePayment()
    {
        $request = Registry::getRequest();
        $paymentService = $this->getServiceFromContainer(PaymentService::class);
        $actualPaymentId = $paymentService->getSessionPaymentId();
        $newPaymentId = $request->getRequestParameter('paymentid');

        // remove the possible exist paypal-payment, if we choose another
        if (
            $actualPaymentId &&
            $actualPaymentId !== $newPaymentId &&
            PayPalDefinitions::isPayPalPayment($actualPaymentId)
        ) {
            $paymentService->removeTemporaryOrder();
        }

        //if a vaulted payment was used, store its index in the session for using it in the next step
        if (!is_null($paymentSourceIndex = $request->getRequestParameter("vaultingpaymentsource"))) {
            Registry::getSession()->setVariable("selectedVaultPaymentSourceIndex", $paymentSourceIndex);
        }


        return parent::validatePayment();
    }

    /**
     * Template variable getter. Returns error text of payments
     *
     * @return string|array
     */
    public function getPaymentErrorText()
    {
        return Registry::getLang()->translateString(
            $this->_sPaymentErrorText,
            (int)Registry::getLang()->getBaseLanguage(),
            false
        );
    }
}
