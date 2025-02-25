<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Model;

use OxidEsales\EshopCommunity\Core\Registry;
use OxidSolutionCatalysts\PayPal\Core\PayPalDefinitions;

class OrderArticle extends OrderArticle_parent
{

    /**
     * Currency in PayPal orders needs to have decimal precision set to 2
     *
     * @param $order
     * @return \stdClass|null
     */
    public function getCurrency($order): ?\stdClass
    {
        $currency = Registry::getConfig()->getCurrencyObject($order->oxorder__oxcurrency->value);
        $currency->decimal = 2;

        return $currency;
    }

    public function getTotalBrutPriceFormated()
    {
        $order = $this->getOrder();
        $currency = $this->getCurrency($order);
        $isPayPalPayment = PayPalDefinitions::isPayPalPayment($order->oxorder__oxpaymenttype->value);

        return $isPayPalPayment ?
            number_format(parent::getTotalBrutPriceFormated(), $currency->decimal, $currency->dec, $currency->thousand)
            : parent::getTotalBrutPriceFormated();
    }

    public function getBrutPriceFormated()
    {
        $order = $this->getOrder();
        $currency = $this->getCurrency($order);
        $isPayPalPayment = PayPalDefinitions::isPayPalPayment($order->oxorder__oxpaymenttype->value);

        return $isPayPalPayment ?
            number_format(parent::getBrutPriceFormated(), $currency->decimal, $currency->dec, $currency->thousand)
            : parent::getTotalBrutPriceFormated();
    }

    public function getNetPriceFormated()
    {
        $order = $this->getOrder();
        $currency = $this->getCurrency($order);
        $isPayPalPayment = PayPalDefinitions::isPayPalPayment($order->oxorder__oxpaymenttype->value);

        return $isPayPalPayment ?
            number_format(parent::getNetPriceFormated(), $currency->decimal, $currency->dec, $currency->thousand)
            : parent::getTotalBrutPriceFormated();
    }

    public function getTotalNetPriceFormated()
    {
        $order = $this->getOrder();
        $currency = $this->getCurrency($order);
        $isPayPalPayment = PayPalDefinitions::isPayPalPayment($order->oxorder__oxpaymenttype->value);

        return $isPayPalPayment ?
            number_format(parent::getTotalNetPriceFormated(), $currency->decimal, $currency->dec, $currency->thousand)
            : parent::getTotalBrutPriceFormated();
    }

}