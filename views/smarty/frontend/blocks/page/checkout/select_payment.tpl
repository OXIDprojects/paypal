[{assign var="config" value=$oViewConf->getPayPalCheckoutConfig()}]
[{if $sPaymentID == "oscpaypal_express"}]
    [{include file='@osc_paypal/frontend/shared/select_payment.tpl'}]
[{elseif $sPaymentID == "oscpaypal_sepa" || $sPaymentID == "oscpaypal_cc_alternative"}]
    [{if $config->isActive() && !$oViewConf->isPayPalExpressSessionActive()}]
        [{include file="@osc_paypal/frontend/shared/sepa_cc_alternative.tpl" sPaymentID=$sPaymentID}]
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
    [{include file="@osc_paypal/frontend/shared/apple_pay.tpl" sPaymentID=$sPaymentID}]
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
