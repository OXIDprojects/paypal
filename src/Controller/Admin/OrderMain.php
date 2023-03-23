<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Model\Country;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Core\Registry;
use OxidSolutionCatalysts\PayPal\Model\PayPalTrackingCarrierList;
use OxidSolutionCatalysts\PayPal\Traits\AdminOrderTrait;
use OxidSolutionCatalysts\PayPal\Traits\JsonTrait;

/**
* OrderMain class
*
* @mixin \OxidEsales\Eshop\Application\Controller\Admin\OrderMain
*/
class OrderMain extends OrderMain_parent
{
    use AdminOrderTrait;
    use JsonTrait;

    protected ?bool $paidWithPayPal = null;

    protected ?array $trackingCarrierCountries = null;

    protected function onOrderSend()
    {
        parent::onOrderSend();
        if ($this->isPayPalStandardOnDeliveryCapture()) {
            $this->capturePayPalStandard();
        }
    }

    public function paidWithPayPal()
    {
        if (is_null($this->paidWithPayPal)) {
            $oxId = $this->getEditObjectId();
            $order = oxNew(Order::class);
            $this->paidWithPayPal= ($order->load($oxId) && $order->paidWithPayPal());
        }
        return $this->paidWithPayPal;
    }

    public function sendOrder()
    {
        // save the order before sending it...
        if ($this->paidWithPayPal()) {

        }
        parent::sendOrder();
    }

    public function save()
    {
        if (Registry::getConfig()->getRequestParameter("sendorder")) {
            $this->sendOrder();
        }
        parent::save();
    }

    public function getPayPalTrackingCarrierCountries(): array
    {
        if (is_null($this->trackingCarrierCountries)) {
            $lang = Registry::getLang();
            $country = oxNew(Country::class);

            $this->trackingCarrierCountries = $this->getPayPalDefaultCarrierSelection();
            $trackingCarrierList = oxNew(PayPalTrackingCarrierList::class);
            $allowedCountries = $trackingCarrierList->getAllowedTrackingCarrierCountryCodes();
            foreach ($allowedCountries as $allowedCountry) {
                $countryId = $country->getIdByCode($allowedCountry);
                $countryTitle = $country->load($countryId) ?
                    $country->getFieldData('oxtitle') :
                    $lang->translateString('OSC_PAYPAL_TRACKCARRIER_' . $allowedCountry);
                $this->trackingCarrierCountries[$allowedCountry] = [
                    'id'       => $allowedCountry,
                    'title'    => $countryTitle,
                    'selected' => ($this->getPayPalOrderCountryCode() === $allowedCountry)
                ];
            }

        }
        return $this->trackingCarrierCountries;
    }

    public function getPayPalTrackingCarrierProvider($countryCode = ''): array
    {
        $provider = $this->getPayPalDefaultCarrierSelection();

        $countryCode = $countryCode ?: $this->getPayPalOrderCountryCode();

        if ($countryCode) {
            $trackingCarrierList = oxNew(PayPalTrackingCarrierList::class);
            $trackingCarrierList->loadTrackingCarriers($countryCode);
            if ($trackingCarrierList->count()) {
                foreach ($trackingCarrierList as $trackingCarrier) {
                    $provider[$trackingCarrier->getId()] = [
                        'id'       => $trackingCarrier->getFieldData('oxkey'),
                        'title'    => $trackingCarrier->getFieldData('oxtitle'),
                        'selected' => false
                    ];
                }
            }
        }

        return $provider;
    }

    public function getPayPalTrackingCarrierProviderAsJson(): void
    {
        $countryCode = (string)Registry::getRequest()->getRequestEscapedParameter('countrycode', '');
        $provider = $this->getPayPalTrackingCarrierProvider($countryCode);
        $this->outputJson($provider);
    }

    protected function getPayPalDefaultCarrierSelection() {
        return [[
            'id'       => '',
            'title'    => '----',
            'selected' => false
        ]];
    }
    public function getPayPalOrderCountryCode(): string
    {
        $countryCode = '';
        $oxId = $this->getEditObjectId();
        $order = oxNew(Order::class);
        if ($order->load($oxId)) {
            $countryId = $order->getFieldData('oxdelcountryid') ?: $order->getFieldData('oxbillcountryid');
            $country = oxNew(Country::class);
            if ($country->load($countryId)) {
                $countryCode = $country->getFieldData('oxisoalpha2');
            }
        }
        return $countryCode;
    }
}
