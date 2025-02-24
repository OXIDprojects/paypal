[{assign var="config" value=$oViewConf->getPayPalCheckoutConfig()}]
[{if $sPaymentID == "oscpaypal_express"}]
    [{include file='modules/osc/paypal/select_payment.tpl'}]
[{elseif $sPaymentID == "oscpaypal_sepa" || $sPaymentID == "oscpaypal_cc_alternative"}]
    [{if $config->isActive() && !$oViewConf->isPayPalExpressSessionActive()}]
        [{include file="modules/osc/paypal/sepa_cc_alternative.tpl" sPaymentID=$sPaymentID}]
    [{/if}]
[{elseif $sPaymentID == "oscpaypal_googlepay"}]
    [{if $config->isActive() && !$oViewConf->isPayPalExpressSessionActive()}]
        [{* we can use the standard-block, but only with a valid config and a non existing pp-express-session *}]
        [{$smarty.block.parent}]
    [{/if}]
[{elseif $sPaymentID == "oscpaypal_applepay"}]
    [{if $config->isActive() && !$oViewConf->isPayPalExpressSessionActive()}]
        [{* we can use the standard-block, but only with a valid config and a non existing pp-express-session *}]
        [{$smarty.block.parent}]
        [{include file="modules/osc/paypal/apple_pay.tpl" sPaymentID=$sPaymentID}]
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
