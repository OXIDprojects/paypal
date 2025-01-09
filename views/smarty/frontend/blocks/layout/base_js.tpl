[{$smarty.block.parent}]
[{if $oViewConf->isPayPalCheckoutActive()}]
    [{assign var="className" value=$oViewConf->getTopActiveClassName()}]
    [{assign var="sFileMTime" value=$oViewConf->getModulePath('osc_paypal','js/paypal-frontend.min.js')|filemtime}]
        <script src="[{$oViewConf->getModuleUrl('osc_paypal','js/paypal-frontend.min.js')|cat:"?"|cat:$sFileMTime}]"></script>
        <script src="[{$oViewConf->getPayPalJsSdkUrl()}]"
                [{if $oViewConf->isVaultingEligibility()}]
                data-user-id-token="[{$oViewConf->getUserIdForVaulting()}]"
                [{/if}]
                data-partner-attribution-id="[{$oViewConf->getPayPalPartnerAttributionIdForBanner()}]"
                data-client-token="[{$oViewConf->getDataClientToken()}]"
                onload="window.OxidPayPal.onSDKLoaded()"
        ></script>
    [{assign var="sCountryRestriction" value=$oViewConf->getCountryRestrictionForPayPalExpress()}]
    [{if $sCountryRestriction}]
        <script>
            const countryRestriction = [[{$sCountryRestriction}]];
        </script>
    [{/if}]
    [{if $submitCart}]
        <script>
            document.getElementById('orderConfirmAgbBottom').submit();
        </script>
    [{/if}]
[{/if}]

