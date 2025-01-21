<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

$sLangName = 'Deutsch';

$aLang = [
    'charset' => 'UTF-8',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T00' => 'PayPal account-to-PayPal account payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T01' => 'Non-payment-related fees',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T02' => 'Currency conversion',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T03' => 'Bank deposit into PayPal account',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T04' => 'Bank withdrawal from PayPal account',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T05' => 'Debit card',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T06' => 'Credit card withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T07' => 'Credit card deposit',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T08' => 'Bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T09' => 'Incentive',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T10' => 'Bill pay',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T11' => 'Reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T12' => 'Adjustment',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T13' => 'Authorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T14' => 'Dividend',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T15' => 'Hold for dispute or other investigation',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T16' => 'Buyer credit deposit',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T17' => 'Non-bank withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T18' => 'Buyer credit withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T19' => 'Account correction',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T20' => 'Funds transfer from PayPal account to another',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T21' => 'Reserves and releases',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T22' => 'Transfers',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T30' => 'Generic instrument and Open Wallet',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T50' => 'Collections and disbursements',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T97' => 'Payables and receivables',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T98' => 'Display only transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_GROUP_T99' => 'Other',

    'OSC_PAYPAL_TRANSACTION_TYPE_T0000' => 'General received payment ',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0001' => 'MassPay payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0002' => 'Subscription payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0003' => 'Pre-approved payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0004' => 'eBay auction payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0005' => 'Direct payment API',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0006' => 'PayPal Checkout APIs',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0007' => 'Website payments standard payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0008' => 'Postage payment to carrier',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0009' => 'Gift certificate payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0010' => 'Third-party auction payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0011' => 'Mobile payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0012' => 'Virtual terminal payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0013' => 'Donation payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0014' => 'Rebate payments',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0015' => 'Third-party payout',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0016' => 'Third-party recoupment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0017' => 'Store-to-store transfers',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0018' => 'PayPal Here payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0019' => 'Generic instrument-funded payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0100' => 'General',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0101' => 'Website payments',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0102' => 'Foreign bank withdrawal fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0103' => 'WorldLink check withdrawal fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0104' => 'Mass payment batch fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0105' => 'Check withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0106' => 'Chargeback processing fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0107' => 'Payment fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0108' => 'ATM withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0109' => 'Auto-sweep from account',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0110' => 'International credit card withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0111' => 'Warranty fee for warranty purchase',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0112' => 'Gift certificate expiration fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0113' => 'Partner fee',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0200' => 'General currency conversion',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0201' => 'User-initiated currency conversion',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0202' => 'Currency conversion required to cover negative balance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0300' => 'General funding of PayPal account',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0301' => 'PayPal balance manager funding of PayPal account',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0302' => 'ACH funding for funds recovery from account balance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0303' => 'Electronic funds transfer (EFT)',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0400' => 'General withdrawal from PayPal account',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0401' => 'AutoSweep',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0500' => 'General PayPal debit card transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0501' => 'Virtual PayPal debit card transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0502' => 'PayPal debit card withdrawal to ATM',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0503' => 'Hidden virtual PayPal debit card transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0504' => 'PayPal debit card cash advance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0505' => 'PayPal debit authorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0600' => 'General credit card withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0700' => 'General credit card deposit',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0701' => 'Credit card deposit for negative PayPal account balance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0800' => 'General',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0801' => 'Debit card cash back bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0802' => 'Merchant referral account bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0803' => 'Balance manager account bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0804' => 'PayPal buyer warranty bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0805' => 'PayPal protection bonus, payout for PayPal buyer protection, payout for full protection with PayPal buyer credit',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0806' => 'Bonus for first ACH use',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0807' => 'Credit card security charge refund',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0808' => 'Credit card cash back bonus',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0900' => 'General incentive or certificate redemption',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0901' => 'Gift certificate redemption',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0902' => 'Points incentive redemption',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0903' => 'Coupon redemption',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0904' => 'eBay loyalty incentive',
    'OSC_PAYPAL_TRANSACTION_TYPE_T0905' => 'Offers used as funding source',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1000' => 'Bill pay transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1100' => 'General reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1101' => 'Reversal of ACH withdrawal transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1102' => 'Reversal of debit card transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1103' => 'Reversal of points usage',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1104' => 'Reversal of ACH deposit',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1105' => 'Reversal of general account hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1106' => 'Payment reversal, initiated by PayPal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1107' => 'Payment refund, initiated by merchant',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1108' => 'Fee reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1109' => 'Fee refund',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1110' => 'Hold for dispute investigation',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1111' => 'Cancellation of hold for dispute resolution',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1112' => 'MAM reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1113' => 'Non-reference credit payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1114' => 'MassPay reversal transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1115' => 'MassPay refund transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1116' => 'Instant payment review (IPR) reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1117' => 'Rebate or cash back reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1118' => 'Generic instrument/Open Wallet reversals (seller side)',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1119' => 'Generic instrument/Open Wallet reversals (buyer side)',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1200' => 'General account adjustment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1201' => 'Chargeback',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1202' => 'Chargeback reversal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1203' => 'Charge-off adjustment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1204' => 'Incentive adjustment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1205' => 'Reimbursement of chargeback',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1207' => 'Chargeback re-presentment rejection',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1208' => 'Chargeback cancellation',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1300' => 'General authorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1301' => 'Reauthorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1302' => 'Void of authorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1400' => 'General dividend',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1500' => 'General temporary hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1501' => 'Account hold for open authorization',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1502' => 'Account hold for ACH deposit',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1503' => 'Temporary hold on available balance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1600' => 'PayPal buyer credit payment funding',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1601' => 'BML credit',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1602' => 'Buyer credit payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1603' => 'Buyer credit payment withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1700' => 'General withdrawal to non-bank institution',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1701' => 'WorldLink withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1800' => 'General buyer credit payment',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1801' => 'BML withdrawal',
    'OSC_PAYPAL_TRANSACTION_TYPE_T1900' => 'General adjustment without business-related event',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2000' => 'General intra-account transfer',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2001' => 'Settlement consolidation',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2002' => 'Transfer of funds from payable',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2003' => 'Transfer to external GL entity',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2101' => 'General hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2102' => 'General hold release',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2103' => 'Reserve hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2104' => 'Reserve release',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2105' => 'Payment review hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2106' => 'Payment review release',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2107' => 'Payment hold',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2108' => 'Payment hold release',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2109' => 'Gift certificate purchase',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2110' => 'Gift certificate redemption',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2111' => 'Funds not yet available',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2112' => 'Funds available',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2113' => 'Blocked payments',
    'OSC_PAYPAL_TRANSACTION_TYPE_T2201' => 'Transfer to and from a credit-card-funded restricted balance',
    'OSC_PAYPAL_TRANSACTION_TYPE_T3000' => 'Generic instrument/Open Wallet transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T5000' => 'Deferred disbursement',
    'OSC_PAYPAL_TRANSACTION_TYPE_T5001' => 'Delayed disbursement',
    'OSC_PAYPAL_TRANSACTION_TYPE_T9700' => 'Account receivable for shipping',
    'OSC_PAYPAL_TRANSACTION_TYPE_T9701' => 'Funds payable',
    'OSC_PAYPAL_TRANSACTION_TYPE_T9702' => 'Funds receivable',
    'OSC_PAYPAL_TRANSACTION_TYPE_T9800' => 'Display only transaction',
    'OSC_PAYPAL_TRANSACTION_TYPE_T9900' => 'Other'
];
