<?php

namespace OxidSolutionCatalysts\PayPal\Service;

use OxidEsales\Eshop\Core\Config;
use OxidEsales\Eshop\Core\Session;
use OxidSolutionCatalysts\PayPal\Core\PayPalDefinitions;

class PayPalUrlService
{
    private Config $config;
    private Session $session;

    public function __construct(Config $config, Session $session)
    {
        $this->session = $session;
        $this->config = $config;
    }
    public function getCancelUrl(): string
    {
        return $this->config->getSslShopUrl() . 'index.php?cl=order&fnc=cancelpaypalsession';
    }
    public function getReturnUrl(): string
    {
        return $this->session->getVariable('paymentid') === PayPalDefinitions::GOOGLEPAY_PAYPAL_PAYMENT_ID ?
            $this->config->getSslShopUrl() . 'index.php?cl=order&fnc=finalizeGooglePay&stoken='
                . $this->session->getSessionChallengeToken() :
            $this->config->getSslShopUrl() . 'index.php?cl=order&fnc=finalizepaypalsession';
    }
}
