[{if $oViewConf->isPayPalCheckoutActive() && $oViewConf->isSDKNecessary()}]
    [{oxstyle include=$oViewConf->getModuleUrl('osc_paypal', 'out/src/css/paypal.min.css')}]
[{/if}]
