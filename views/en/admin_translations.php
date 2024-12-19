<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

use OxidSolutionCatalysts\PayPal\Core\PayPalDefinitions;

$sLangName = 'English';

$aLang = [
    'charset'                                     => 'UTF-8',
    'paypal'                                      => 'PayPal',
    'tbclorder_oscpaypal'                         => 'PayPal Checkout',
    // PayPal Config
    'OSC_PAYPAL_CONFIG'                           => 'Configuration',
    'OSC_PAYPAL_GENERAL'                          => 'General',
    'OSC_PAYPAL_WEBHOOK_ID'                       => 'Webhook ID',
    'OSC_PAYPAL_OPMODE'                           => 'Operation mode',
    'OSC_PAYPAL_OPMODE_LIVE'                      => 'Live',
    'OSC_PAYPAL_OPMODE_SANDBOX'                   => 'Sandbox',
    'OSC_PAYPAL_CLIENT_ID'                        => 'Client ID',
    'OSC_PAYPAL_CLIENT_SECRET'                    => 'Secret',
    'OSC_PAYPAL_MERCHANT_ID'                      => 'Merchant ID',
    'OSC_PAYPAL_CREDENTIALS'                      => 'API credentials',
    'OSC_PAYPAL_LIVE_CREDENTIALS'                 => 'Live API credentials',
    'OSC_PAYPAL_SANDBOX_CREDENTIALS'              => 'Sandbox API credentials',
    'OSC_PAYPAL_LIVE_BUTTON_CREDENTIALS'          => 'SignUp Merchant Integration (Live)',
    'OSC_PAYPAL_LIVE_BUTTON_CREDENTIALS_INIT'     => 'Start Merchant Integration (Live) in a new window ...',
    'OSC_PAYPAL_SANDBOX_BUTTON_CREDENTIALS'       => 'SignUp Merchant Integration (Sandbox)',
    'OSC_PAYPAL_SANDBOX_BUTTON_CREDENTIALS_INIT'  => 'Start Merchant Integration (Sandbox) in a new window ...',
    'OSC_PAYPAL_ONBOARD_CLICK_HELP'               => 'Please close the page if you want to cancel the PayPal integration...',
    'OSC_PAYPAL_ONBOARD_CLOSE_HELP'               => 'You can now close the window.',
    'OSC_PAYPAL_ERR_CONF_INVALID'                 =>
        'One or more configuration values are either not set or incorrect.
        Please double check them.<br>
        <b>Module inactive.</b>',
    'OSC_PAYPAL_CONF_VALID'                       => 'Configuration values OK.<br><b>Module is active</b>',
    'OSC_PAYPAL_BUTTON_PLACEMEMT_TITLE'           => 'Button placement settings',
    'OSC_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT' => 'Product details page',
    'OSC_PAYPAL_BASKET_BUTTON_PLACEMENT'          => 'Basket',
    'OSC_PAYPAL_MINIBASKET_BUTTON_PLACEMENT'      => 'Mini-Basket',
    'HELP_OSC_PAYPAL_BUTTON_PLACEMEMT'            => 'Toggle the display of PayPal buttons',
    'OSC_SHOW_PAYPAL_PAYLATER_BUTTON'             => 'Show "Pay later"-Button?',
    'HELP_OSC_SHOW_PAYPAL_PAYLATER_BUTTON'        => 'In addition to the classic PayPal button, there is a "Pay later"-button that can be displayed below the standard button. If it is activated, the customer has the option of paying for the goods later.',

    'OSC_PAYPAL_EXPRESS_LOGIN_TITLE'              => 'Login with PayPal',
    'OSC_PAYPAL_LOGIN_WITH_PAYPAL_EMAIL'          => 'Automatically log in to shop during checkout',
    'HELP_OSC_PAYPAL_EXPRESS_LOGIN'               => 'In case there is already a shop user registered with password to the same mail address as the the PayPal mail,
        it is possible to be autonmatically be logged in to shop when logging in to PayPal. This behavior may not be in the
        security interests of your customers',

    'HELP_OSC_PAYPAL_CREDENTIALS_PART1'           => 'Please use the “PayPal Integration” button displayed to register and activate new features. During the integration, PayPal activates
        the payment methods "credit card", "Pay upon Invoice", "ApplePay" and "GooglePay" and automatically registers the webhook.',
    'HELP_OSC_PAYPAL_CREDENTIALS_PART2'           => 'Enter the API credentials (client ID, client password, Webhook ID) only if you do not need the above payment methods and are able
        to configure a webhook in the PayPal backend yourself.',
    'HELP_OSC_PAYPAL_CLIENT_ID'                   => 'Client ID for live mode.',
    'HELP_OSC_PAYPAL_CLIENT_SECRET'               => 'Secret for live mode. Please enter the password twice.',
    'HELP_OSC_PAYPAL_MERCHANT_ID'                 => 'Merchant ID for live mode.',
    'HELP_OSC_PAYPAL_SANDBOX_CLIENT_ID'           => 'Client ID for sandbox mode.',
    'HELP_OSC_PAYPAL_SANDBOX_CLIENT_SECRET'       => 'Secret for sandbox mode. Please enter the password twice.',
    'HELP_OSC_PAYPAL_SANDBOX_MERCHANT_ID'         => 'Merchant ID for sandbox mode.',
    'HELP_OSC_PAYPAL_SANDBOX_WEBHOOK_ID'          =>
        'The ID of the sandbox-webhook as configured in your Developer Portal account',
    'HELP_OSC_PAYPAL_OPMODE'                      =>
        'To configure and test PayPal, use Sandbox (test). When you\'re ready
        to receive real transactions, switch to Production (live).',
    'HELP_OSC_PAYPAL_WEBHOOK_ID'                  =>
        'The ID of the webhook as configured in your Developer Portal account',
    'OSC_PAYPAL_SPECIAL_PAYMENTS'                 => 'Activation for special payment methods has taken place',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_PUI'             => 'Pay upon Invoice',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_ACDC'            => 'Creditcard',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_ACDC_FALLBACK'   => '<em>- Alternatively, you can activate and use the payment method "PayPal Credit Card Fallback" (id: "' . PayPalDefinitions::CCALTERNATIVE_PAYPAL_PAYMENT_ID . '"). Please use a suitable name for this payment method in this fallback case.</em>',


    'OSC_PAYPAL_SPECIAL_PAYMENTS_VAULTING'        => 'Vaulting',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_APPLEPAY'        => 'Applepay',

    'OSC_PAYPAL_SPECIAL_PAYMENTS_VAULTING'        => 'Vaulting',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_GOOGLEPAY'       => 'GooglePay',

    'OSC_PAYPAL_LOCALISATIONS'                    => 'Locals',
    'OSC_PAYPAL_LOCALES'                          => 'regional language settings',
    'HELP_OSC_PAYPAL_LOCALES'                     => 'PayPal supports displaying the PayPal buttons in regional languages. Please enter the codes separated by commas in ISO 639-1 alpha-2 / ISO 3166-1 alpha-2 format (e.g. de_DE). The first entry is the default entry.',

    // PayPal ORDER
    'OSC_PAYPAL_ACTIONS'                          => 'Actions',
    'OSC_PAYPAL_ISSUE_REFUND'                     => 'Issue refund',
    'OSC_PAYPAL_AMOUNT'                           => 'Amount',
    'OSC_PAYPAL_SHOP_PAYMENT_STATUS'              => 'Shop payment status',
    'OSC_PAYPAL_ORDER_PRICE'                      => 'Full order price',
    'OSC_PAYPAL_ORDER_PRODUCTS'                   => 'Ordered products',
    'OSC_PAYPAL_CAPTURED'                         => 'Captured',
    'OSC_PAYPAL_REFUNDED'                         => 'Refunded',
    'OSC_PAYPAL_CAPTURED_NET'                     => 'Resulting payment amount',
    'OSC_PAYPAL_CAPTURED_AMOUNT'                  => 'Captured amount',
    'OSC_PAYPAL_AUTHORIZED_AMOUNT'                => 'Autorisierter Betrag',
    'OSC_PAYPAL_REFUNDED_AMOUNT'                  => 'Refunded amount',
    'OSC_PAYPAL_MONEY_CAPTURE'                    => 'Money capture',
    'OSC_PAYPAL_MONEY_REFUND'                     => 'Money refund',
    'OSC_PAYPAL_CAPTURE'                          => 'Capture',
    'OSC_PAYPAL_REFUND'                           => 'Refund',
    'OSC_PAYPAL_DETAILS'                          => 'Details',
    'OSC_PAYPAL_AUTHORIZATION'                    => 'Authorization',
    'OSC_PAYPAL_CANCEL_AUTHORIZATION'             => 'Void',
    'OSC_PAYPAL_PAYMENT_HISTORY'                  => 'PayPal history',
    'OSC_PAYPAL_HISTORY_DATE'                     => 'Date',
    'OSC_PAYPAL_HISTORY_ACTION'                   => 'Action',
    'OSC_PAYPAL_HISTORY_PAYPAL_STATUS'            => 'PayPal status',
    'OSC_PAYPAL_HISTORY_PAYPAL_STATUS_HELP'       =>
        'Payment status returned from PayPal. For more details see:
        <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank">
            PayPal status
        </a>',
    'OSC_PAYPAL_HISTORY_COMMENT'                  => 'Comment',
    'OSC_PAYPAL_HISTORY_NOTICE'                   => 'Note',
    'OSC_PAYPAL_MONEY_ACTION_FULL'                => 'full',
    'OSC_PAYPAL_MONEY_ACTION_PARTIAL'             => 'partial',
    'OSC_PAYPAL_LIST_STATUS_ALL'                  => 'All',
    'OSC_PAYPAL_STATUS_APPROVED'                  => 'Approved',
    'OSC_PAYPAL_STATUS_CREATED'                   => 'Created',
    'OSC_PAYPAL_STATUS_COMPLETED'                 => 'Completed',
    'OSC_PAYPAL_STATUS_CAPTURED'                  => 'Captured',
    'OSC_PAYPAL_STATUS_DECLINED'                  => 'Declined',
    'OSC_PAYPAL_STATUS_PARTIALLY_REFUNDED'        => 'Partially refunded',
    'OSC_PAYPAL_STATUS_PENDING'                   => 'Pending',
    'OSC_PAYPAL_STATUS_PENDING_APPROVAL'          => 'Pending Approval',
    'OSC_PAYPAL_STATUS_REFUNDED'                  => 'Refunded',
    'OSC_PAYPAL_STATUS_PAYER_ACTION_REQUIRED'     => 'Payer action required',
    'OSC_PAYPAL_PAYMENT_METHOD'                   => 'Payment method',
    'OSC_PAYPAL_COMMENT'                          => 'Comment',
    'OSC_PAYPAL_TRANSACTIONID'                    => 'Transaction ID',
    'OSC_PAYPAL_REFUND_AMOUNT'                    => 'Refund amount',
    'OSC_PAYPAL_INVOICE_ID'                       => 'Invoice No',
    'OSC_PAYPAL_NOTE_TO_BUYER'                    => 'Note to buyer',
    'OSC_PAYPAL_REFUND_ALL'                       => 'Refund all',
    'OSC_PAYPAL_FIRST_NAME'                       => 'First name',
    'OSC_PAYPAL_LAST_NAME'                        => 'Last name',
    'OSC_PAYPAL_FULL_NAME'                        => 'Full name',
    'OSC_PAYPAL_EMAIL'                            => 'Email',
    'OSC_PAYPAL_ADDRESS_LINE_1'                   => 'Address line 1',
    'OSC_PAYPAL_ADDRESS_LINE_2'                   => 'Address line 2',
    'OSC_PAYPAL_ADDRESS_LINE_3'                   => 'Address line 3',
    'OSC_PAYPAL_ADMIN_AREA_1'                     => 'Province, State, or ISO-subdivision',
    'OSC_PAYPAL_ADMIN_AREA_2'                     => 'City',
    'OSC_PAYPAL_ADMIN_AREA_3'                     => 'Sub-locality, Suburb, Neighborhood or District',
    'OSC_PAYPAL_ADMIN_AREA_4'                     => 'The neighborhood, ward, or district',
    'OSC_PAYPAL_POSTAL_CODE'                      => 'Postal code',
    'OSC_PAYPAL_COUNTRY_CODE'                     => 'Country code',
    'OSC_PAYPAL_SHIPPING'                         => 'Shipping',
    'OSC_PAYPAL_BILLING'                          => 'Billing',
    'OSC_PAYPAL_PAYMENT_PUI'                      => 'Pay upon Invoice - Bankdata',
    'OSC_PAYPAL_PAYMENT_PUI_REFERENCE'            => 'Payment Reference',
    'OSC_PAYPAL_PAYMENT_PUI_BIC'                  => 'BIC',
    'OSC_PAYPAL_PAYMENT_PUI_IBAN'                 => 'IBAN',
    'OSC_PAYPAL_PAYMENT_PUI_BANKNAME'             => 'Bankname',
    'OSC_PAYPAL_PAYMENT_PUI_ACCOUNTHOLDER'        => 'Accountholder',

    'OSC_PAYPAL_BANNER_TRANSFERLEGACYSETTINGS'     => 'Apply settings from the classic PayPal module',
    'OSC_PAYPAL_BANNER_TRANSFERREDOLDSETTINGS'     => 'Banner settings have been transferred from the classig PayPal module.',
    'OSC_PAYPAL_BANNER_CREDENTIALS'                => 'Banner settings',
    'OSC_PAYPAL_BANNER_INFOTEXT'                   => 'Offer your customers PayPal installment payment with 0% effective annual interest. <a href="https://www.paypal.com/de/webapps/mpp/installments" target="_blank">Read more</a>.',
    'OSC_PAYPAL_BANNER_SHOW_ALL'                   => 'Enable installment banners',
    'HELP_OSC_PAYPAL_BANNER_SHOP_MODULE_SHOW_ALL'  => 'Check this option to enable the banner feature.',
    'OSC_PAYPAL_BANNER_STARTPAGE'                   => 'Show installment banner on start page',
    'OSC_PAYPAL_BANNER_STARTPAGESELECTOR'           => 'CSS selector of the start page after which the banner is displayed.',
    'HELP_OSC_PAYPAL_BANNER_STARTPAGESELECTOR'      => 'Default values for Apex and Wave theme is: \'#wrapper .row\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_CATEGORYPAGE'                => 'Show installment banner on category pages',
    'OSC_PAYPAL_BANNER_CATEGORYPAGESELECTOR'        => 'CSS selector of the category pages after which the banner is displayed.',
    'HELP_OSC_PAYPAL_BANNER_CATEGORYPAGESELECTOR'   => 'Default values for Apex theme is: \'.list-header\'. Default values for Wave theme is: \'.page-header\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_SEARCHRESULTSPAGE'           => 'Show installment banner on search results pages',
    'OSC_PAYPAL_BANNER_SEARCHRESULTSPAGESELECTOR'   => 'CSS selector of the search results pages after which the banner is displayed.',
    'HELP_OSC_PAYPAL_BANNER_SEARCHRESULTSPAGESELECTOR' => 'Default values for Apex and Wave theme is: \'.list-header\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_DETAILSPAGE'                 => 'CSS selector of the product detail pages after which the banner is displayed.',
    'OSC_PAYPAL_BANNER_DETAILSPAGESELECTOR'         => 'CSS-Selektor der Detailseiten hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_DETAILSPAGESELECTOR'    => 'Default values for Apex theme is: \'.breadcrumb-wrapper > .container-xxl\'. Default values for Wave theme is: \'.breadcrumb\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_CHECKOUTPAGE'                => 'Show installment banner on checkout pages',
    'OSC_PAYPAL_BANNER_CARTPAGESELECTOR'            => 'CSS selector of the "Cart" page (checkout step 1) after which the banner is displayed.',
    'HELP_OSC_PAYPAL_BANNER_CARTPAGESELECTOR'       => 'Default values for Apex and Wave theme is: \'#basket-paypal-installment-banner\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_PAYMENTPAGESELECTOR'         => 'CSS selector of the "Pay" page (checkout step 3) after which the banner is displayed.',
    'HELP_OSC_PAYPAL_BANNER_PAYMENTPAGESELECTOR'    => 'Default values for Apex theme is: \'HEADER.header\'. Default values for Apex theme is: \'#shipping\'. After these CSS selectors the banner is displayed.',
    'OSC_PAYPAL_BANNER_COLORSCHEME'                 => 'Select installment banner\'s color',
    'OSC_PAYPAL_BANNER_COLORSCHEMEBLUE'             => 'blue',
    'OSC_PAYPAL_BANNER_COLORSCHEMEBLACK'            => 'black',
    'OSC_PAYPAL_BANNER_COLORSCHEMEWHITE'            => 'white',
    'OSC_PAYPAL_BANNER_COLORSCHEMEGRAY'             => 'gray',
    'OSC_PAYPAL_BANNER_COLORSCHEMEMONOCHROME'       => 'monochrome',
    'OSC_PAYPAL_BANNER_COLORSCHEMEGRAYSCALE'        => 'grayscale',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME'              => 'PayPal Standard - Capture money',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_LABEL'        => 'A deviating collection of money at the time of the order is only possible for PayPal Standard. All other payment methods (incl. PayPal Express) will be capture immediately.',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_HELP'         => 'Please note! The authorization of an order is valid for three days. It will be refreshed automatically for a maximum of 29 days after ordering. After that, it is no longer possible to capture the money.',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_DIRECTLY'     => 'directly',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_DELIVERY'     => 'automatically upon delivery',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_MANUALLY'     => 'manually',
    'OSC_PAYPAL_CAPTURE_DAYS_LEFT'                  => 'There are still %s days to capture the money',
    'OSC_PAYPAL_CAPTURE_NOT_POSSIBLE_ANYMORE'       => 'Time for capture money unfortunately expired. Please contact the customer to discuss alternatives.',
    'OSC_PAYPALPLUS_PAYMENT_OVERVIEW'               => 'Payment overview',
    'OSC_PAYPALPLUS_PAYMENT_STATUS'                 => 'Payment status',
    'OSC_PAYPALPLUS_ORDER_AMOUNT'                   => 'Payment total',
    'OSC_PAYPALPLUS_REFUNDED_AMOUNT'                => 'Refunded amount',
    'OSC_PAYPALPLUS_PAYMENT_ID'                     => 'Payment ID',
    'OSC_PAYPALPLUS_PAYMENT_METHOD'                 => 'Payment method',

    'OSC_PAYPALPLUS_PAYMENT_REFUNDING'              => 'Refunds',
    'OSC_PAYPALPLUS_AVAILABLE_REFUNDS'              => 'Remaining number of refund operation:',
    'OSC_PAYPALPLUS_AVAILABLE_REFUND_AMOUNT'        => 'Remaining payment amount to refund:',
    'OSC_PAYPALPLUS_DATE'                           => 'Date',
    'OSC_PAYPALPLUS_AMOUNT'                         => 'Amount',
    'OSC_PAYPALPLUS_STATUS'                         => 'Status',
    'OSC_PAYPALPLUS_REFUND'                         => 'Refund',

    'OSC_PAYPALPLUS_PUI'                            => 'Payment upon invoice',
    'OSC_PAYPALPLUS_PUI_PAYMENT_INSTRUCTIONS'       => 'Payment Instructions',
    'OSC_PAYPALPLUS_PUI_TERM'                       => 'Term',
    'OSC_PAYPALPLUS_PUI_ACCOUNT_HOLDER'             => 'Benificiary',
    'OSC_PAYPALPLUS_PUI_BANK_NAME'                  => 'Bank',
    'OSC_PAYPALPLUS_PUI_REFERENCE_NUMBER'           => 'Reference Number',
    'OSC_PAYPALPLUS_PUI_IBAN'                       => 'IBAN',
    'OSC_PAYPALPLUS_PUI_BIC'                        => 'BIC',

    'OSC_PAYPALSOAP_AMOUNT'                         => 'Amount',
    'OSC_PAYPALSOAP_SHOP_PAYMENT_STATUS'            => 'Shop payment status',
    'OSC_PAYPALSOAP_ORDER_PRICE'                    => 'Full order price',
    'OSC_PAYPALSOAP_ORDER_PRODUCTS'                 => 'Ordered products',
    'OSC_PAYPALSOAP_CAPTURED'                       => 'Captured',
    'OSC_PAYPALSOAP_REFUNDED'                       => 'Refunded',
    'OSC_PAYPALSOAP_CAPTURED_NET'                   => 'Resulting payment amount',
    'OSC_PAYPALSOAP_CAPTURED_AMOUNT'                => 'Captured amount',
    'OSC_PAYPALSOAP_REFUNDED_AMOUNT'                => 'Refunded amount',
    'OSC_PAYPALSOAP_VOIDED_AMOUNT'                  => 'Voided amount',
    'OSC_PAYPALSOAP_CAPTURE'                        => 'Capture',
    'OSC_PAYPALSOAP_REFUND'                         => 'Refund',
    'OSC_PAYPALSOAP_AUTHORIZATION'                  => 'Authorization',
    'OSC_PAYPALSOAP_PAYMENT_HISTORY'                => 'PayPal history',
    'OSC_PAYPALSOAP_HISTORY_DATE'                   => 'Date',
    'OSC_PAYPALSOAP_HISTORY_ACTION'                 => 'Action',
    'OSC_PAYPALSOAP_HISTORY_PAYPAL_STATUS'          => 'PayPal status',
    'OSC_PAYPALSOAP_HISTORY_PAYPAL_STATUS_HELP'     => 'Payment status returned from PayPal. For more details see: <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank" >PayPal status</a>',
    'OSC_PAYPALSOAP_STATUS_pending'                 => 'Pending',
    'OSC_PAYPALSOAP_STATUS_completed'               => 'Completed',
    'OSC_PAYPALSOAP_STATUS_failed'                  => 'Failed',
    'OSC_PAYPALSOAP_STATUS_canceled'                => 'Canceled',
    'OSC_PAYPALSOAP_COMMENT'                        => 'Comment',
    'OSC_PAYPALSOAP_AUTHORIZATIONID'                => 'Authorization ID',
    'OSC_PAYPALSOAP_TRANSACTIONID'                  => 'Transaction ID',
    'OSC_PAYPALSOAP_CORRELATIONID'                  => 'Correlation ID',

    'OSC_PAYPAL_ERROR_NOT_PAID_WITH_PAYPAL'         => 'Order not paid via PayPal Checkout Module',
    'OSC_PAYPAL_ERROR_INVALID_RESOURCE_ID'          => 'The PayPal-Checkout-Order has an invalid resource-ID',
    'OSC_PAYPAL_PAYPALPLUS_TABLE_DOES_NOT_EXISTS'   => 'Order was paid with the PayPal Plus module, but the databases no longer exist',
    'OSC_PAYPAL_PAYPALSOAP_TABLE_DOES_NOT_EXISTS'   => 'Order was paid with the PayPal Soap module, but the databases no longer exist',

    'OSC_PAYPAL_SCA_CONTINGENCY'                    => '3D Secure for advanced credit and debit cards',
    'OSC_PAYPAL_SCA_ALWAYS'                         => '3D Secure for each ACDC transaction',
    'OSC_PAYPAL_SCA_WHEN_REQUIRED'                  => 'SCA when required by regional mandate, decision by PayPal system',
    'OSC_PAYPAL_SCA_DISABLED'                       => 'Disable 3D Secure result evaluation',
    'OSC_PAYPAL_SCA_CONTINGENCY_LABEL'              => 'Creditcard security',
    'OSC_PAYPAL_SCA_CONTINGENCY_HELP'               => 'Use 3D Secure to authenticate card holders through card issuers. It reduces the likelihood of fraud when you use supported cards and improves transaction performance.
                                                        A successful 3D Secure authentication can shift liability for fraudulent chargebacks from you to the card issuer. <br>
                                                        3D Secure authentication is performed only if the card is enrolled for the service. <br> When your customer submits their card details on your website for processing,
                                                        you have the option of triggering 3D Secure. When triggered, customers are prompted by their card issuing bank to complete an additional verification step
                                                        to enter a one-time or static password, depending on the implementation.<br>
                                                        Chose "SCA when required by regional mandate, decision by PayPal system" to let PayPal system decide whether 3D check is necessary.
                                                         With setting "3D Secure for each ACDC transaction" 3D check will be enforced for each transaction.',

    'OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS_TITLE' => 'Handling not finished orders',
    'OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS'       => 'Automatically cancel not finished orders?',
    'HELP_OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS'  => 'For some PayPal payment methods, an order must be created in advance so that it can be used with PayPal.
                                                        It can happen that customers cancel the process during the payment process and do not return to the shop. In that case stay
                                                        unfinished orders left that can be automatically canceled. Alternatively, you are welcome to check these orders yourself
                                                        cancel manually.',
    'OSC_PAYPAL_STARTTIME_CLEANUP_ORDERS'           => 'Start time for automatic cancellation',
    'HELP_OSC_PAYPAL_STARTTIME_CLEANUP_ORDERS'      => 'How old do not finished orders have to be before they are automatically canceled (in minutes)?',
    'OSC_PAYPAL_EXPRESS_SHIPPING_TITLE'             => 'Pseudo shipping costs for PayPal Express',
    'OSC_PAYPAL_EXPRESS_SHIPPING_DESC'              => 'PayPal Express requires shipping costs to authorize the shopping cart amount. If a customer has neither logged in to the shop nor provided their shipping address, the shop cannot calculate shipping costs by default. In the shop settings (Master Settings > Core Settings > Tab Settings > Section Other Settings ) there is an option "Calculate default Shipping costs when User is not logged in yet". This allows OXID to try to calculate the shipping costs for standard cases. If you do not want to use this option, the last option is to enter pseudo shipping costs. These should be as close to the shipping costs you use most often. As soon as the customer is in the checkout and their delivery address and desired shipping method are known to the shop, the actual shipping costs are calculated. These overwrite all previously used "auxiliary" shipping costs.',

    'OSC_PAYPAL_ORDER_MAIN_TRACKCARRIER_COUNTRY'    => 'Tracking Carrier (Country)',
    'OSC_PAYPAL_ORDER_MAIN_TRACKCARRIER_PROVIDER'   => 'Tracking Carrier (Provider)',
    'OSC_PAYPAL_TRACKCARRIER_GLOBAL'                => 'global',

    'OSC_PAYPAL_VAULTING_TITLE'                     => 'PayPal Vaulting',
    'OSC_PAYPAL_VAULTING_ACTIVATE_VAULTING'         => 'PayPal Vaulting active',
    'HELP_OSC_PAYPAL_VAULTING_ACTIVATE_VAULTING'    => 'Repeat purchases made easy: With PayPal you can securely store your customers preferred payment methods, making it quick and easy
                                                        Enable purchase processing. With their saved payment details, customers can make repeat purchases with just a few clicks. This can be for you
                                                        mean higher checkout conversion.',
    'OSC_PAYPAL_GOOGLEPAY_TITLE'                     => 'Google Pay address',
    'OSC_PAYPAL_GOOGLEPAY_ADDRESS_ACTIVATE'           => 'Google Pay address active',
    'HELP_OSC_OSC_PAYPAL_GOOGLEPAY_ADRESS_ACTIVATE'     => 'Takeover delivery address from googlepay',

    'OSC_PAYPAL_INSTALLPROCESS_FAILED'              => 'Because the module was not installed correctly via Composer, errors occurred during the (de)activation of the module. Please reinstall the module via composer and repeat the process.',

    'OSC_PAYPAL_CUSTOM_ID_CONTENTS_TITLE'           => 'PayPal custom id field contents',
    'OSC_PAYPAL_CUSTOM_ID_CONTENTS_DESC'            => 'PayPal custom id field will be JSON encoded string with order number, shop version and the PayPal module version.',

    // PayPal Payment
    'OSC_PAYPAL_PAYMENT_DEPRECATED'                 => 'This PayPal payment method can no longer be activated as it will be removed soon!',
];
