[{if $oViewConf->isPayPalCheckoutActive() && $oViewConf->isSDKNecessary()}]
    [{assign var="sFileMTime" value=$oViewConf->getModulePath('osc_paypal','out/src/css/paypal.min.css')|filemtime}]
    [{oxstyle include=$oViewConf->getModuleUrl('osc_paypal', 'out/src/css/paypal.min.css')|cat:"?"|cat:$sFileMTime}]
[{/if}]
