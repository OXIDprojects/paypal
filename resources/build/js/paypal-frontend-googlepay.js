window.OxidPayPalGooglePay = {

    baseRequest: {
        apiVersion: 2,
        apiVersionMinor: 0,
    },
    paymentsClient: null,
    allowedPaymentMethods: null,
    merchantInfo: null,
    googlePayContainer: null,
    buttonId: null,
    token: null,
    selfLink: null,
    useGooglePayAddress: null,
    isSandbox: null,
    merchantName: null,
    totalPrice: null,
    currency: null,
    deliveryAddressMD5: null,
    language: null,
    loadingContainer: null,
    init: async function () {
        this.googlePayContainer = document.getElementById('oscpaypal_googlepay');
        if (this.googlePayContainer) {
            this.buttonId = this.googlePayContainer.dataset.buttonId;
            this.token = this.googlePayContainer.dataset.token;
            this.selfLink = this.googlePayContainer.dataset.selfLink;
            this.useGooglePayAddress = !!Number(this.googlePayContainer.dataset.useGooglePayAddress);
            this.isSandbox = !!Number(this.googlePayContainer.dataset.isSandbox);
            this.merchantName = this.googlePayContainer.dataset.merchantName;
            this.totalPrice = this.googlePayContainer.dataset.totalPrice;
            this.currency = this.googlePayContainer.dataset.currency;
            this.deliveryAddressMD5 = this.googlePayContainer.dataset.deliveryAddressMd5;
            this.language = this.googlePayContainer.dataset.language;
            let elements = document.getElementsByClassName(this.googlePayContainer.dataset.loadingContainerClassName);
            this.loadingContainer = elements[0];

            await window.googlePayReady;
            this.onGooglePayLoaded();
        }
    },
    getGoogleIsReadyToPayRequest: function (allowedPaymentMethods) {
        return Object.assign({}, this.baseRequest, {
            allowedPaymentMethods: allowedPaymentMethods
        });
    },

    /* Fetch Default Config from PayPal via PayPal SDK */
    getGooglePayConfig: async function () {
        if (this.allowedPaymentMethods == null || this.merchantInfo == null) {
            const googlePayConfig = await paypal.Googlepay().config();
            this.allowedPaymentMethods = googlePayConfig.allowedPaymentMethods;
            this.merchantInfo = googlePayConfig.merchantInfo;
            this.merchantInfo.merchantName = this.merchantName;
        }
        return {
            allowedPaymentMethods: this.allowedPaymentMethods,
            merchantInfo: this.merchantInfo
        };
    },

    /* Configure support for the Google Pay API */
    getGooglePaymentDataRequest: async function () {
        const paymentDataRequest = Object.assign({}, this.baseRequest);
        const {allowedPaymentMethods, merchantInfo} = await this.getGooglePayConfig();

        paymentDataRequest.transactionInfo = this.getGoogleTransactionInfo();
        paymentDataRequest.allowedPaymentMethods = allowedPaymentMethods;
        paymentDataRequest.merchantInfo = merchantInfo;
        paymentDataRequest.callbackIntents = ["PAYMENT_AUTHORIZATION"];
        paymentDataRequest.emailRequired = true;
        paymentDataRequest.shippingAddressRequired = this.useGooglePayAddress;
        paymentDataRequest.shippingAddressParameters = {'phoneNumberRequired': true};

        return paymentDataRequest;
    },

    onPaymentAuthorized: function (paymentData) {
        return new Promise(function (resolve) {
            this.processPayment(paymentData)
                .then(function () {
                    resolve({transactionState: "SUCCESS"});
                })
                .catch(function () {
                    resolve({transactionState: "ERROR"});
                });
        }.bind(this));
    },

    getGooglePaymentsClient: function () {
        if (this.paymentsClient === null) {
            this.paymentsClient = new google.payments.api.PaymentsClient({
                environment: this.isSandbox ? "TEST" : "PRODUCTION",
                paymentDataCallbacks: {
                    onPaymentAuthorized: this.onPaymentAuthorized.bind(this),
                },
            });
        }
        return this.paymentsClient;
    },
    onGooglePayLoaded: async function () {
        if (window.OxidPayPal && window.OxidPayPal.isSDKLoaded()) {
            const paymentsClient = this.getGooglePaymentsClient();
            const {allowedPaymentMethods} = await this.getGooglePayConfig();
            paymentsClient
                .isReadyToPay(this.getGoogleIsReadyToPayRequest(allowedPaymentMethods))
                .then(function (response) {
                    if (response.result) {
                        this.loadingContainer.style.display = 'none';
                        this.addGooglePayButton();
                    }
                }.bind(this))
                .catch(function (err) {
                    console.error(err);
                });
        } else {
            window.setTimeout(this.onGooglePayLoaded.bind(this), 500);
        }
    },

    addGooglePayButton: function () {
        const paymentsClient = this.getGooglePaymentsClient();
        const button = paymentsClient.createButton({
            buttonType: 'buy',
            buttonLocale: this.language,
            onClick: this.onGooglePaymentButtonClicked.bind(this),
        });
        document.getElementById("oscpaypal_googlepay").appendChild(button);
    },

    getGoogleTransactionInfo: function () {
        return {
            currencyCode: this.currency,
            totalPriceStatus: "FINAL",
            totalPrice: this.totalPrice,
            totalPriceLabel: "Total",
        };
    },

    onGooglePaymentButtonClicked: async function () {
        const paymentDataRequest = await this.getGooglePaymentDataRequest();
        paymentDataRequest.transactionInfo = this.getGoogleTransactionInfo();
        const paymentsClient = this.getGooglePaymentsClient();
        paymentsClient.loadPaymentData(paymentDataRequest);
    },

    processPayment: async function (paymentData) {
        try {
            const createOrderUrl = this.selfLink + '&cl=oscpaypalproxy&fnc=createGooglepayOrder&paymentid=oscpaypal_googlepay&context=continue&stoken=' + this.token;

            const {id: orderId, status, links} = await fetch(createOrderUrl, {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify(paymentData),
            }).then((res) => res.json());

            if (status === "CREATED") {
                /* Capture the Order */
                this.confirmOrder(orderId, paymentData);
                return {transactionState: "SUCCESS"};
            } else if (status === "APPROVED") {
                /* Capture the Order */
                this.captureOrder(orderId);
                return {transactionState: "SUCCESS"};
            } else {
                console.error("Payment was not approved");
                return {transactionState: "ERROR"};
            }
        } catch (err) {
            return {
                transactionState: "ERROR",
                error: {
                    message: err.message,
                },
            };
        }
    },
    confirmOrder: async function (orderId, paymentData) {
        const confirmOrderResponse = await paypal.Googlepay().confirmOrder({
            orderId: orderId,
            paymentMethodData: paymentData.paymentMethodData
        });

        const hateoasLinks = new OxidPayPalHateoasLinks();
        const payerActionLink = hateoasLinks.getPayerActionLink(confirmOrderResponse.links);

        if (confirmOrderResponse.status === "PAYER_ACTION_REQUIRED") {
            console.log("==== Confirm Payment Completed Payer Action Required =====");
            this.googlePayUserActionRequired(orderId);
        } else {
            if (this.isSandbox) {
                console.log("==== confirmOrder: Not Approved =====");
            }
        }
    },

    googlePayUserActionRequired: function (orderId) {
        paypal
            .Googlepay()
            .initiatePayerAction({ orderId: orderId })
            .then(async () => {
                console.log("===== Payer Action Completed =====");
                await this.captureOrder(orderId);
                await this.createOxidOrder(orderId);
            });
    },
    createOxidOrder: async function (orderId) {
        const url = this.selfLink + '&cl=order&fnc=createGooglePayOrder&context=continue&stoken=' + this.token + '&sDeliveryAddressMD5=' + this.deliveryAddressMD5;
        createData = new FormData();
        createData.append('orderID', orderId);
        fetch(url, {
            method: 'POST',
            body: createData
        }).then(function (res) {
            return res.json();
        }).then(function (data) {
            if (data.status === "ERROR") {
                location.reload();
            }
        });
    },
    captureOrder: async function (orderId) {
        captureData = new FormData();
        captureData.append('orderID', orderId);
        await fetch(this.selfLink + '&cl=order&fnc=captureGooglePayOrder&context=continue&stoken=' + this.token + '&sDeliveryAddressMD5=' + this.deliveryAddressMD5, {
            method: 'post',
            body: captureData
        }).then(function (res) {
            return res.json();
        }).then(function (data) {
            console.log("==== Capture Order Completed ====");
            var goNext = Array.isArray(data.location) && data.location[0];

            window.location.href = this.selfLink + goNext;
            if (data.status === "ERROR") {
                location.reload();
            }
        }.bind(this)).catch(reason => {
            console.error(reason);
        });
    }
};

OxidPayPalGooglePay.init();
