<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Core\Utils;

use OxidEsales\Eshop\Application\Model\Country;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\Order as PayPalApiOrderModel;
use VIISON\AddressSplitter\AddressSplitter;
use VIISON\AddressSplitter\Exceptions\SplittingException;

class PayPalAddressResponseToOxidAddress
{
    /**
     * @param PayPalApiOrderModel $response PayPal Response
     * @return array
     */
    public static function mapOrderDeliveryAddress(
        PayPalApiOrderModel $response
    ): array {
        return self::mapAddress(
            $response,
            'oxorder__oxdel'
        );
    }

    /**
     * @param PayPalApiOrderModel $response PayPal Response
     * @return array
     */
    public static function mapUserDeliveryAddress(
        PayPalApiOrderModel $response
    ): array {
        return self::mapAddress(
            $response,
            'oxaddress__ox'
        );
    }

    /**
     * @param PayPalApiOrderModel $response PayPal Response
     * @return array
     */
    public static function mapUserInvoiceAddress(
        PayPalApiOrderModel $response
    ): array {
        return self::mapAddress(
            $response,
            'oxuser__ox'
        );
    }

    /**
     * @param PayPalApiOrderModel $response PayPal Response
     * @param string $DBTablePrefix
     * @return array|bool
     */
    private static function mapAddress(
        PayPalApiOrderModel $response,
        string $DBTablePrefix
    ): array {
        $country = oxNew(Country::class);

        $shippingAddress = $response->purchase_units[0]->shipping->address;
        $shippingFullName = $response->purchase_units[0]->shipping->name->full_name;
        $payer = $response->payer;

        $countryId = $country->getIdByCode($shippingAddress->country_code);
        $country->load($countryId);
        $countryName = $country->oxcountry__oxtitle->value;

        $streetNo = '';
        try {
            $streetTmp = $shippingAddress->address_line_1;
            $addressData = AddressSplitter::splitAddress($streetTmp);
            $street = $addressData['streetName'] ?? '';
            $streetNo = $addressData['houseNumber'] ?? '';
        } catch (SplittingException $e) {
            // The Address could not be split
            $street = $streetTmp;
        }

        $fon = $payer->phone->phone_number->national_number ?? null;

        return [
            $DBTablePrefix . 'fname' => self::getFirstName($shippingFullName),
            $DBTablePrefix . 'lname' => self::getLastName($shippingFullName),
            $DBTablePrefix . 'street' => $street,
            $DBTablePrefix . 'streetnr' => $streetNo,
            $DBTablePrefix . 'addinfo' => $shippingAddress->address_line_2,
            $DBTablePrefix . 'city' => $shippingAddress->admin_area_2,
            $DBTablePrefix . 'countryid' => $countryId,
            $DBTablePrefix . 'country' => $countryName,
            $DBTablePrefix . 'zip' => $shippingAddress->postal_code,
            $DBTablePrefix . 'fon' => $fon,
            // Needed to not produce an error in InputValidator->hasRequiredParametersForVatInCheck()
            $DBTablePrefix . 'ustid' => "",
            // Needed to not produce an error in InputValidator->hasRequiredParametersForVatInCheck()
            $DBTablePrefix . 'company' => "",
        ];
    }

    protected static function getFirstName($name)
    {
        return implode(' ', array_slice(explode(' ', (string) $name), 0, -1));
    }

    protected static function getLastName($name)
    {
        return array_slice(explode(' ', (string) $name), -1)[0];
    }
}
