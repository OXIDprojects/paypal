[{assign var="sToken" value=$oViewConf->getSessionChallengeToken()}]
[{assign var="sSelfLink" value=$oViewConf->getSslSelfLink()|replace:"&amp;":"&"}]
[{assign var="config" value=$oViewConf->getPayPalCheckoutConfig()}]

<script>
[{capture name="detailsGooglePayScript"}]
/* Fetch Default Config from PayPal via PayPal SDK */  
allowedPaymentMethods = null;
merchantInfo = null;

async function getGooglePayConfig() {  
  if (allowedPaymentMethods == null || merchantInfo == null) {  
    const googlePayConfig = await paypal.Googlepay().config();  
    allowedPaymentMethods = googlePayConfig.allowedPaymentMethods;  
    merchantInfo = googlePayConfig.merchantInfo;
    console.log(googlePayConfig);  
  }  
 
  return {  
     allowedPaymentMethods,  
     merchantInfo,  
   };  
}  
 
a = getGooglePayConfig();  

const baseRequest = { "apiVersion": 2, "apiVersionMinor": 0 };

const allowedCardNetworks = ["MASTERCARD", "DISCOVER", "VISA", "AMEX"];

const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

const tokenizationSpecification = { "type": "PAYMENT_GATEWAY", "parameters": { "gateway": "paypalsb", "gatewayMerchantId": "[{$config->getMerchantId()}]" }};

const baseCardPaymentMethod = {
  "type": "CARD",
  "parameters": {
    "allowedAuthMethods": allowedCardAuthMethods,
    "allowedCardNetworks": allowedCardNetworks,
    "billingAddressRequired": true, 
    "assuranceDetailsRequired": true,
    "billingAddressParameters": { "format": "FULL" }
  }
};

const cardPaymentMethod = Object.assign(
  {},
  baseCardPaymentMethod,
  {
    "tokenizationSpecification": tokenizationSpecification
  }
);



let paymentsClient = null;

function getGoogleIsReadyToPayRequest() {
  return Object.assign(
      {},
      baseRequest,
      { "allowedPaymentMethods": [baseCardPaymentMethod] }
  );
}

function getGooglePaymentDataRequest() {
  const paymentDataRequest = Object.assign({}, baseRequest );

  paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
  paymentDataRequest.merchantInfo = { "merchantId": "[{$config->getMerchantId()}]", "merchantName": [{$oxcmp_shop->oxshops__oxname->value|json_encode}] };

  paymentDataRequest.callbackIntents = ["PAYMENT_AUTHORIZATION"];
  paymentDataRequest.emailRequired = true;  
  paymentDataRequest.shippingAddressRequired = true;
  paymentDataRequest.shippingAddressParameters = { "phoneNumberRequired": true };

  return paymentDataRequest;
}

function getGooglePaymentsClient() {
  if ( paymentsClient === null ) {
     paymentsClient = new google.payments.api.PaymentsClient({
        "environment": [{ if $config->isSandbox() }]"TEST"[{else}]"PRODUCTION"[{/if}],
        "paymentDataCallbacks": { "onPaymentAuthorized": onPaymentAuthorized }
    });
  }
  return paymentsClient;
}

function onPaymentAuthorized(paymentData) {
  return new Promise(function(resolve, reject){
      processPayment(paymentData)
      .then(function() { 
        resolve({transactionState: "SUCCESS"});
      })
      .catch(function() {
        resolve({
          transactionState: "ERROR",
          error: {
            intent: "PAYMENT_AUTHORIZATION",
            message: "Insufficient funds, try again. Next attempt should work.",
            reason: "PAYMENT_DATA_INVALID"
          }
        });
	  })
      .catch(function(err) {
         console.log(err);
      });
  });
}

function onGooglePayLoaded() {
  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
    .then(function(response) {
      if (response.result) {
        addGooglePayButton();
      }
    })
    .catch(function(err) {
      console.log(err);
    });
}

function addGooglePayButton() {
  const paymentsClient = getGooglePaymentsClient();
  const button = paymentsClient.createButton({ "buttonType": "buy", 
                                               "buttonLocale": "[{$oView->getActiveLangAbbr()|oxlower}]", 
                                               "onClick": onGooglePaymentButtonClicked 
  });
  document.getElementById("[{$buttonId}]").appendChild(button);
}

async function onGooglePaymentButtonClicked() {
  const paymentDataRequest = getGooglePaymentDataRequest();
  const activities_url = "[{$sSelfLink|cat:"cl=oscpaypalproxy&fnc=getGooglepayBasket&paymentid=oscpaypal_googlepay&context=continue&aid="|cat:$aid|cat:"&stoken="|cat:$sToken}]";
  
  try {
    const result = await fetch(activities_url);
    const json = await result.json();
    
    paymentDataRequest.transactionInfo = {
      "countryCode": json.countryCode,
      "currencyCode": json.currencyCode,
      "totalPriceStatus": json.totalPriceStatus,
      "totalPrice": json.totalPrice,
      "totalPriceLabel": json.totalPriceLabel };  

  } catch (error) {
    console.error(error);
  } 
  
  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.loadPaymentData(paymentDataRequest)
  .then(function() {
    //location.replace("[{$sSelfLink|cat:"cl=order"}]");
  })
  .catch(err => {
     if( err.statusCode != "CANCELED")
        console.log(err)
  });
}

function processPayment(paymentData) {
  return new Promise(function(resolve, reject) {
    setTimeout(function() {

        console.log(paymentData);
        paymentToken = paymentData.paymentMethodData.tokenizationData.token;
      
        data = fetch("[{$sSelfLink|cat:"cl=oscpaypalproxy&fnc=createGooglepayOrder&paymentid=oscpaypal_googlepay&context=continue&aid="|cat:$aid|cat:"&stoken="|cat:$sToken}]", {
           "credentials": "same-origin",
           "mode": "same-origin",
           "method": "post",
           "headers": { "content-type": "application/json" },
           "body": JSON.stringify(paymentData)
        })
        .catch(err => {
           console.log(err)
         });

	     resolve({});   
 
    }, 500);
  });
}
[{/capture}]
</script>
[{oxscript add=$smarty.capture.detailsGooglePayScript}]
<script async="async" src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
