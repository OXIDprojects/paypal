[{assign var="config" value=$oViewConf->getPayPalCheckoutConfig()}]
[{if $blCanBuy && !$oDetailsProduct->isNotBuyable() && $config->isActive() && !$oViewConf->isPayPalExpressSessionActive() && $config->showPayPalProductDetailsButton()}]
    [{include file="@osc_paypal/frontend/shared/paymentbuttons.tpl" buttonId="PayPalButtonProductMain" buttonClass="paypal-button-wrapper large" aid=$oDetailsProduct->oxarticles__oxid->value}]
[{/if}]
