[{if $oViewConf->isPayPalCheckoutActive() && $oViewConf->isSDKNecessary()}]
    <script src="[{$oViewConf->getPayPalJsSdkUrl()}]"
            data-partner-attribution-id="[{$oViewConf->getPayPalPartnerAttributionIdForBanner()}]"
            data-client-token="[{$oViewConf->getDataClientToken()}]"
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