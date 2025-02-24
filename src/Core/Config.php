<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Core;

use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidSolutionCatalysts\PayPal\Module;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;
use OxidSolutionCatalysts\PayPalApi\Client;
use RuntimeException;

/**
 * Class Config
 */
class Config
{
    use ServiceContainer;

    /**
     * Checks if module configurations are valid
     *
     * @throws StandardException
     */
    public function checkHealth(): void
    {
        if (!$this->getServiceFromContainer(ModuleSettings::class)->checkHealth()) {
            throw oxNew(
                StandardException::class
            );
        }
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        try {
            $this->checkHealth();
        } catch (StandardException $exception) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandbox();
    }

    /**
     * Get client id based on set active mode
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getClientId();
    }

    /**
     * Get client secret based on active mode
     *
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getClientSecret();
    }

    /**
     * Get merchantId based on active mode
     *
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getMerchantId();
    }

    /**
     * @return string
     */
    public function getWebhookId()
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getWebhookId();
    }

    public function isAcdcEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isAcdcEligibility();
    }

    public function isPuiEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isPuiEligibility();
    }

    public function isVaultingEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isVaultingEligibility();
    }

    public function isLiveAcdcEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isLiveAcdcEligibility();
    }

    public function isLivePuiEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isLivePuiEligibility();
    }

    public function isLiveVaultingEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isLiveVaultingEligibility();
    }
    public function isLiveApplePayEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isLiveApplePayEligibility();
    }
    public function isLiveGooglePayEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isLiveGooglePayEligibility();
    }
    public function isSandboxGooglePayEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandboxGooglePayEligibility();
    }

    public function isSandboxAcdcEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandboxAcdcEligibility();
    }

    public function isSandboxPuiEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandboxPuiEligibility();
    }

    public function isSandboxVaultingEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandboxVaultingEligibility();
    }
    public function isSandboxApplePayEligibility(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isSandboxApplePayEligibility();
    }
    public function getLiveClientId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getLiveClientId();
    }

    public function getLiveClientSecret(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getLiveClientSecret();
    }

    public function getLiveMerchantId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getLiveMerchantId();
    }

    public function getLiveWebhookId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getLiveWebhookId();
    }

    public function getSupportedLocales(): array
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSupportedLocales();
    }

    public function getSupportedLocalesCommaSeparated(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSupportedLocalesCommaSeparated();
    }

    public function getSandboxClientId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSandboxClientId();
    }

    public function getSandboxClientSecret(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSandboxClientSecret();
    }

    public function getSandboxMerchantId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSandboxMerchantId();
    }

    public function getSandboxWebhookId(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSandboxWebhookId();
    }

    public function showPayPalBasketButton(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showPayPalBasketButton();
    }

    public function showPayPalMiniBasketButton(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showPayPalMiniBasketButton();
    }

    public function showPayPalPayLaterButton(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showPayPalPayLaterButton();
    }

    public function loginWithPayPalEMail(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->loginWithPayPalEMail();
    }

    public function showPayPalProductDetailsButton(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showPayPalProductDetailsButton();
    }

    public function getAutoBillOutstanding(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getAutoBillOutstanding();
    }

    public function getSetupFeeFailureAction(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSetupFeeFailureAction();
    }

    public function getPaymentFailureThreshold(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPaymentFailureThreshold();
    }

    public function showAllPayPalBanners(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showAllPayPalBanners();
    }

    public function showBannersOnStartPage(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showBannersOnStartPage();
    }

    public function getStartPageBannerSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getStartPageBannerSelector();
    }
    public function getDefaultShippingPriceForExpress(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getDefaultShippingPriceForExpress();
    }

    public function showBannersOnCategoryPage(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showBannersOnCategoryPage();
    }

    public function getCategoryPageBannerSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getCategoryPageBannerSelector();
    }

    public function showBannersOnSearchPage(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showBannersOnSearchPage();
    }

    public function getSearchPageBannerSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getSearchPageBannerSelector();
    }

    public function showBannersOnProductDetailsPage(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showBannersOnProductDetailsPage();
    }

    public function getProductDetailsPageBannerSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getProductDetailsPageBannerSelector();
    }

    public function showBannersOnCheckoutPage(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->showBannersOnCheckoutPage();
    }

    public function getPayPalCheckoutBannerCartPageSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPayPalCheckoutBannerCartPageSelector();
    }

    public function getPayPalCheckoutBannerPaymentPageSelector(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPayPalCheckoutBannerPaymentPageSelector();
    }

    public function getPayPalCheckoutBannerColorScheme(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPayPalCheckoutBannerColorScheme();
    }

    public function getPayPalStandardCaptureStrategy(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPayPalStandardCaptureStrategy();
    }

    public function getPayPalSCAContingency(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getPayPalSCAContingency();
    }

    public function alwaysIgnoreSCAResult(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->alwaysIgnoreSCAResult();
    }

    public function cleanUpNotFinishedOrdersAutomaticlly(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->cleanUpNotFinishedOrdersAutomaticlly();
    }

    public function getStartTimeCleanUpOrders(): int
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getStartTimeCleanUpOrders();
    }

    public function isCustomIdSchemaStructural(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->isCustomIdSchemaStructural();
    }

    public function tableExists(string $tableName = ''): bool
    {
        $exists = false;
        if ($tableName) {
            $exists = DatabaseProvider::getDb()->getOne(
                "SELECT
                    IF( EXISTS
                        (SELECT * FROM information_schema.COLUMNS
                            WHERE TABLE_SCHEMA = :database
                            AND TABLE_NAME = :tablename
                            LIMIT 1),
                    1, 0)
                    AS if_exists",
                [
                    ':database' => Registry::getConfig()->getConfigParam("dbName"),
                    ':tablename' => $tableName
                ]
            );
        }
        return (bool)$exists;
    }

    /**
     * Return path to cache dir
     * Write to a extra folder in the tmp folder to not be deleted when module config changes
     * (tmp dir is cleared when module config changes in oxid 7)
     *
     * @return string
     */
    public function getCacheDir(): string
    {
        $dir = Registry::getConfig()->getConfigParam('sCompileDir')
            . DIRECTORY_SEPARATOR . Module::MODULE_ID . DIRECTORY_SEPARATOR;
        if ((file_exists($dir) === false) && !mkdir($dir) && !is_dir($dir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $dir));
        }
        return $dir;
    }

    /**
     * get the full File Name of the Token Cache
     *
     * @return string
     */
    public function getTokenCacheFileName(): string
    {
        return $this->getCacheDir() . 'paypaltoken_' . Registry::getConfig()->getActiveShop()->getId() . '.txt';
    }


    /**
     * get the full File Name of the Data-Client-Token Cache
     *
     * @return string
     */
    public function getDataClientTokenCacheFileName(): string
    {
        return $this->getCacheDir() . 'dataclienttoken_' . Registry::getConfig()->getActiveShop()->getId() . '.txt';
    }

    /**
     * Get a Admin URL with all necessary Admin-params
     *
     * @return string
     */
    public function getAdminUrlForJSCalls(): string
    {
        $config = Registry::getConfig();
        $url = $config->getConfigParam('sAdminSSLURL') ?:
            $config->getConfigParam('sShopURL') . $config->getConfigParam('sAdminDir') . "/";
        $url = Registry::getSession()->processUrl($url . 'index.php?');
        $url = str_replace("&amp;", "&", $url);
        return $url;
    }

    /**
     * Get webhook controller url
     *
     * @return string
     */
    public function getWebhookControllerUrl(): string
    {
        $webhookUrl = 'index.php?cl=oscpaypalwebhook';

        if ($this->isSandbox()) {
             $webhookUrl .= '&XDEBUG_SESSION_START=1';
        }

        return html_entity_decode(
            Registry::getConfig()->getCurrentShopUrl(false) . $webhookUrl
        );
    }

    public function getClientUrl(): string
    {
        return $this->isSandbox() ? $this->getClientSandboxUrl() : $this->getClientLiveUrl();
    }

    public function getClientLiveUrl(): string
    {
        return Client::PRODUCTION_URL;
    }

    public function getClientSandboxUrl(): string
    {
        return Client::SANDBOX_URL;
    }

    public function getIsVaultingActive(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getIsVaultingActive();
    }

    public function getUserIdForVaulting(): string
    {
        $user = Registry::getConfig()->getUser();
        $payPalCustomerId = $user ? $user->getFieldData("oscpaypalcustomerid") : '';

        if (!$payPalCustomerId) {
            return "";
        }

        $vaultingService = Registry::get(ServiceFactory::class)->getVaultingService();
        $response = $vaultingService->generateUserIdToken($payPalCustomerId);

        return $response["id_token"] ?? "";
    }

    public function getIsGooglePayDeliveryAdressActive(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getIsGooglePayDeliveryAddressActive();
    }
}
