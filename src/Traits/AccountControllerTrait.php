<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Traits;

use OxidEsales\Eshop\Core\Registry;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;

trait AccountControllerTrait
{
    public function deleteVaultedPayment()
    {
        $paymentTokenId = Registry::getRequest()->getRequestEscapedParameter("paymentTokenId");
        $vaultingService = Registry::get(ServiceFactory::class)->getVaultingService();

        if (!$vaultingService->deleteVaultedPayment($paymentTokenId)) {
            Registry::getUtilsView()->addErrorToDisplay(
                Registry::getLang()->translateString('OSC_PAYPAL_DELETE_FAILED'),
                false,
                true
            );
        }
    }

    public function getUserIdForVaulting(): string
    {
        if (!$this->getUser()) {
            return "";
        }

        $payPalCustomerId = $this->getUser()->getFieldData("oscpaypalcustomerid");

        if (!$payPalCustomerId) {
            return "";
        }

        $vaultingService = Registry::get(ServiceFactory::class)->getVaultingService();
        $response = $vaultingService->generateUserIdToken($payPalCustomerId);

        return $response["id_token"] ?? "";
    }
}
