<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

return [
    'charset'                                     => 'UTF-8',
    'paypal'                                      => 'PayPal',
    'tbclorder_oscpaypal'                         => 'PayPal Checkout',
    // PayPal Config
    'OSC_PAYPAL_CONFIG'                           => 'Konfiguration',
    'OSC_PAYPAL_GENERAL'                          => 'Allgemein',
    'OSC_PAYPAL_WEBHOOK_ID'                       => 'Webhook-ID',
    'OSC_PAYPAL_OPMODE'                           => 'Betriebsmodus',
    'OSC_PAYPAL_OPMODE_LIVE'                      => 'Live',
    'OSC_PAYPAL_OPMODE_SANDBOX'                   => 'Sandbox',
    'OSC_PAYPAL_CLIENT_ID'                        => 'Client-ID',
    'OSC_PAYPAL_CLIENT_SECRET'                    => 'Passwort',
    'OSC_PAYPAL_MERCHANT_ID'                      => 'Merchant-ID',
    'OSC_PAYPAL_CREDENTIALS'                      => 'API-Anmeldeinformationen',
    'OSC_PAYPAL_LIVE_CREDENTIALS'                 => 'API-Anmeldeinformationen (Live)',
    'OSC_PAYPAL_SANDBOX_CREDENTIALS'              => 'API-Anmeldeinformationen (Sandbox)',
    'OSC_PAYPAL_LIVE_BUTTON_CREDENTIALS'          => 'Anmeldung Händler PayPal-Integration (Live)',
    'OSC_PAYPAL_LIVE_BUTTON_CREDENTIALS_INIT'     => 'Händler PayPal-Integration (Live) im neuen Fenster starten ...',
    'OSC_PAYPAL_SANDBOX_BUTTON_CREDENTIALS'       => 'Anmeldung Händler PayPal-Integration (Sandbox)',
    'OSC_PAYPAL_SANDBOX_BUTTON_CREDENTIALS_INIT'  => 'Händler PayPal-Integration (Sandbox) im neuen Fenster starten ...',
    'OSC_PAYPAL_ONBOARD_CLICK_HELP'               => 'Bitte schließen Sie diese Seite, wenn Sie die PayPal-Integration abbrechen wollen ...',
    'OSC_PAYPAL_ONBOARD_CLOSE_HELP'               => 'Onboarding erfolgreich. Sie können das Fenster jetzt schließen.',
    'OSC_PAYPAL_ERR_CONF_INVALID'                 =>
        'Ein oder mehrere Konfigurationswerte sind entweder nicht festgelegt oder falsch.
        Bitte überprüfen Sie sie noch einmal.<br>
        <b>Modul inaktiv.</b>',
    'OSC_PAYPAL_CONF_VALID'                       => 'Konfigurationswerte OK.<br><b>Modul ist aktiv</b>',
    'OSC_PAYPAL_BUTTON_PLACEMEMT_TITLE'           => 'Einstellungen für die Buttonplatzierung',
    'OSC_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT' => 'Produktdetailseite',
    'OSC_PAYPAL_BASKET_BUTTON_PLACEMENT'          => 'Warenkorb',
    'OSC_PAYPAL_MINIBASKET_BUTTON_PLACEMENT'      => 'Mini-Warenkorb',
    'HELP_OSC_PAYPAL_BUTTON_PLACEMEMT'            => 'Schalten Sie die Anzeige der PayPal-Schaltflächen um',
    'OSC_SHOW_PAYPAL_PAYLATER_BUTTON'             => '"Später Bezahlen"-Button anzeigen?',
    'HELP_OSC_SHOW_PAYPAL_PAYLATER_BUTTON'        => 'Neben den klassischen PayPal-Button gibt es ein "Später Bezahlen"-Button, der unter dem Standardbutton angezeigt werden kann. Ist der aktiviert, bekommt der Kunde direkt die Möglichkeit, die Ware später zu zahlen.',

    'OSC_PAYPAL_EXPRESS_LOGIN_TITLE'              => 'Login mit PayPal',
    'OSC_PAYPAL_LOGIN_WITH_PAYPAL_EMAIL'          => 'Im Shop beim Kauf automatisch einloggen',
    'HELP_OSC_PAYPAL_EXPRESS_LOGIN'               => 'Wenn die Shop-Kundenkonto-EMail-Adresse gleich der PayPal-EMail-Adresse ist,
        besteht die Möglichkeit, sich durch ein Login bei PayPal auch automatisch im Shop anzumelden. Möglicherweise ist dieses Verhalten nicht im
        Sicherheitsinteresse Ihrer Kunden',

    'HELP_OSC_PAYPAL_CREDENTIALS_PART1'           => 'Tragen Sie die API-Anmeldeinformationen (Client-ID, Client Passwort,
         Webhook-ID) nur dann per Hand ein, wenn Sie auf die Zahlarten "Kreditkarte" und "Kauf auf Rechnung" nicht benötigen und in der Lage sind einen Webhook im PayPal-
         Backend selbst zu konfigurieren.',
    'HELP_OSC_PAYPAL_CREDENTIALS_PART2'           => 'Bitte nutzen Sie für die Anmeldung den eingeblendeten "PayPal Integration"-Button. Während der Integration werden durch PayPal die Zahlarten "Kreditkarte"
         und "Kauf auf Rechnung" freigeschaltet, sowie der Webhook automatisch registriert.',
    'HELP_OSC_PAYPAL_CLIENT_ID'                   => 'Client-ID des Live-Account für Live-Modus',
    'HELP_OSC_PAYPAL_CLIENT_SECRET'               => 'Passwort des Live-Account für Live-Modus. Bitte geben Sie das Passwort zweimal ein.',
    'HELP_OSC_PAYPAL_MERCHANT_ID'                 => 'Merchant-ID des Live-Account für Live-Modus',
    'HELP_OSC_PAYPAL_SANDBOX_CLIENT_ID'           => 'Client-ID des Sandbox-Account für Sandbox-Modus',
    'HELP_OSC_PAYPAL_SANDBOX_CLIENT_SECRET'       => 'Passwort des Sandbox-Account für Sandbox-Modus. Bitte geben Sie das Passwort zweimal ein.',
    'HELP_OSC_PAYPAL_SANDBOX_MERCHANT_ID'         => 'Merchant-ID des Sandbox-Account für Sandbox-Modus',
    'HELP_OSC_PAYPAL_SANDBOX_WEBHOOK_ID'          =>
        'Die ID des Sandbox-Webhooks, wie in Ihrem Developer Portal-Konto konfiguriert',
    'HELP_OSC_PAYPAL_OPMODE'                      =>
        'Verwenden Sie Sandbox (Test), um PayPal zu konfigurieren und zu testen. Wenn Sie bereit sind,
        echte Transaktionen zu empfangen, wechseln Sie zu Produktion (live).',
    'HELP_OSC_PAYPAL_WEBHOOK_ID'                  =>
        'Die ID des Webhooks, wie in Ihrem Developer Portal-Konto konfiguriert',
    'OSC_PAYPAL_SPECIAL_PAYMENTS'                 => 'Freischaltung für besondere Zahlarten erfolgt',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_PUI'             => 'Rechnungskauf',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_ACDC'            => 'Kreditkarte',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_ACDC_FALLBACK'   => '(Alternativ zur fehlenden Zahlart wird ein zusätzlicher Button "Kreditkarte" unter den Paypal-Buttons angezeigt.)',
    'OSC_PAYPAL_SPECIAL_PAYMENTS_VAULTING'        => 'Vaulting',

    'OSC_PAYPAL_LOCALISATIONS'                    => 'Spracheinstellungen',
    'OSC_PAYPAL_LOCALES'                          => 'regionale Spracheinstellungen',
    'HELP_OSC_PAYPAL_LOCALES'                     => 'PayPal unterstützt die Anzeige der PayPal-Buttons in regionalen Sprachen. Bitte hinterlegen sie die Codes kommasepariert im ISO 639-1 alpha-2 / ISO 3166-1 alpha-2 - Format (z.B. de_DE). Der erste Eintrag ist der Standard-Eintrag.',

    // PayPal ORDER
    'OSC_PAYPAL_ACTIONS'                          => 'Aktionen',
    'OSC_PAYPAL_ISSUE_REFUND'                     => 'Rückerstattung ausstellen',
    'OSC_PAYPAL_AMOUNT'                           => 'Betrag',
    'OSC_PAYPAL_SHOP_PAYMENT_STATUS'              => 'Shop-Zahlungsstatus',
    'OSC_PAYPAL_ORDER_PRICE'                      => 'Bestellpreis gesamt',
    'OSC_PAYPAL_ORDER_PRODUCTS'                   => 'Bestellte Artikel',
    'OSC_PAYPAL_CAPTURED'                         => 'Eingezogen',
    'OSC_PAYPAL_REFUNDED'                         => 'Erstattet',
    'OSC_PAYPAL_CAPTURED_NET'                     => 'Resultierender Zahlungsbetrag',
    'OSC_PAYPAL_CAPTURED_AMOUNT'                  => 'Eingezogener Betrag',
    'OSC_PAYPAL_AUTHORIZED_AMOUNT'                => 'Autorisierter Betrag',
    'OSC_PAYPAL_REFUNDED_AMOUNT'                  => 'Erstatteter Betrag',
    'OSC_PAYPAL_MONEY_CAPTURE'                    => 'Geldeinzug',
    'OSC_PAYPAL_MONEY_REFUND'                     => 'Gelderstattung',
    'OSC_PAYPAL_CAPTURE'                          => 'Einziehen',
    'OSC_PAYPAL_REFUND'                           => 'Erstatten',
    'OSC_PAYPAL_DETAILS'                          => 'Details',
    'OSC_PAYPAL_AUTHORIZATION'                    => 'Autorisierung',
    'OSC_PAYPAL_CANCEL_AUTHORIZATION'             => 'Stornieren',
    'OSC_PAYPAL_PAYMENT_HISTORY'                  => 'PayPal-Historie',
    'OSC_PAYPAL_HISTORY_DATE'                     => 'Datum',
    'OSC_PAYPAL_HISTORY_ACTION'                   => 'Aktion',
    'OSC_PAYPAL_HISTORY_PAYPAL_STATUS'            => 'PayPal-Status',
    'OSC_PAYPAL_HISTORY_PAYPAL_STATUS_HELP'       =>
        'Von PayPal zurückgegebener Zahlungsstatus. Für mehr Details siehe (nur Englisch):
        <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank">
            PayPal Zahlungsstatus
        </a>',
    'OSC_PAYPAL_HISTORY_COMMENT'                  => 'Kommentar',
    'OSC_PAYPAL_HISTORY_NOTICE'                   => 'Hinweis',
    'OSC_PAYPAL_MONEY_ACTION_FULL'                => 'vollständig',
    'OSC_PAYPAL_MONEY_ACTION_PARTIAL'             => 'teilweise',
    'OSC_PAYPAL_LIST_STATUS_ALL'                  => 'Alle',
    'OSC_PAYPAL_STATUS_APPROVED'                  => 'genehmigt',
    'OSC_PAYPAL_STATUS_CREATED'                   => 'erstellt',
    'OSC_PAYPAL_STATUS_COMPLETED'                 => 'abgeschlossen',
    'OSC_PAYPAL_STATUS_CAPTURED'                  => 'eingezogen',
    'OSC_PAYPAL_STATUS_DECLINED'                  => 'abgelehnt',
    'OSC_PAYPAL_STATUS_PARTIALLY_REFUNDED'        => 'Teilweise erstattet',
    'OSC_PAYPAL_STATUS_PENDING'                   => 'steht aus',
    'OSC_PAYPAL_STATUS_PENDING_APPROVAL'          => 'Genehmigung ausstehend',
    'OSC_PAYPAL_STATUS_REFUNDED'                  => 'Erstattet',
    'OSC_PAYPAL_STATUS_PAYER_ACTION_REQUIRED'     => 'Aktion des Käufers erforderlich',
    'OSC_PAYPAL_PAYMENT_METHOD'                   => 'Zahlungsart',
    'OSC_PAYPAL_COMMENT'                          => 'Kommentar',
    'OSC_PAYPAL_TRANSACTIONID'                    => 'Transaktions-ID',
    'OSC_PAYPAL_REFUND_AMOUNT'                    => 'Rückerstattungsbetrag',
    'OSC_PAYPAL_INVOICE_ID'                       => 'Rechnungs-Nr',
    'OSC_PAYPAL_NOTE_TO_BUYER'                    => 'Hinweis für Käufer',
    'OSC_PAYPAL_REFUND_ALL'                       => 'Alle erstatten',
    'OSC_PAYPAL_FIRST_NAME'                       => 'Vorname',
    'OSC_PAYPAL_LAST_NAME'                        => 'Nachname',
    'OSC_PAYPAL_FULL_NAME'                        => 'Vollständiger Name',
    'OSC_PAYPAL_EMAIL'                            => 'Email',
    'OSC_PAYPAL_ADDRESS_LINE_1'                   => 'Adresse Zeile 1',
    'OSC_PAYPAL_ADDRESS_LINE_2'                   => 'Adresse Zeile 2',
    'OSC_PAYPAL_ADDRESS_LINE_3'                   => 'Adresse Zeile 3',
    'OSC_PAYPAL_ADMIN_AREA_1'                     => 'Provinz, Bundesland oder ISO-Unterteilung',
    'OSC_PAYPAL_ADMIN_AREA_2'                     => 'Stadt',
    'OSC_PAYPAL_ADMIN_AREA_3'                     => 'Ortsteil, Vorort, Bezirk',
    'OSC_PAYPAL_ADMIN_AREA_4'                     => 'Nachbarschaft, Gemeinde',
    'OSC_PAYPAL_POSTAL_CODE'                      => 'Postleitzahl',
    'OSC_PAYPAL_COUNTRY_CODE'                     => 'Ländercode',
    'OSC_PAYPAL_SHIPPING'                         => 'Versand',
    'OSC_PAYPAL_BILLING'                          => 'Abrechnung',
    'OSC_PAYPAL_PAYMENT_PUI'                      => 'Kauf auf Rechnung - Bankdaten',
    'OSC_PAYPAL_PAYMENT_PUI_REFERENCE'            => 'Verwendungszweck',
    'OSC_PAYPAL_PAYMENT_PUI_BIC'                  => 'BIC',
    'OSC_PAYPAL_PAYMENT_PUI_IBAN'                 => 'IBAN',
    'OSC_PAYPAL_PAYMENT_PUI_BANKNAME'             => 'Bankname',
    'OSC_PAYPAL_PAYMENT_PUI_ACCOUNTHOLDER'        => 'Kontoinhaber',

    'OSC_PAYPAL_BANNER_TRANSFERLEGACYSETTINGS'     => 'Einstellungen aus dem klassischen PayPal-Modul übernehmen',
    'OSC_PAYPAL_BANNER_TRANSFERREDOLDSETTINGS'     => 'Banner-Einstellungen wurden aus dem klassischen PayPal-Modul übertragen.',
    'OSC_PAYPAL_BANNER_CREDENTIALS'                => 'Banner-Einstellungen',
    'OSC_PAYPAL_BANNER_INFOTEXT'                   => 'Bieten Sie Ihren Kunden PayPal Ratenzahlung mit 0% effektiven Jahreszins an. <a href="https://www.paypal.com/de/webapps/mpp/installments" target="_blank">Erfahren Sie hier mehr</a>.',
    'OSC_PAYPAL_BANNER_SHOW_ALL'                   => 'Ratenzahlung-Banner aktivieren',
    'HELP_OSC_PAYPAL_BANNER_SHOP_MODULE_SHOW_ALL'  => 'Aktivieren Sie diese Einstellung, um die Bannerfunktion zuzulassen.',
    'OSC_PAYPAL_BANNER_STARTPAGE'                   => 'Ratenzahlung-Banner auf Startseite anzeigen',
    'OSC_PAYPAL_BANNER_STARTPAGESELECTOR'           => 'CSS-Selektor der Startseite hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_STARTPAGESELECTOR'      => 'Standardwert für das Theme "Apex" und "Wave": \'#wrapper .row\'. Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_CATEGORYPAGE'                => 'Ratenzahlung-Banner auf Kategorieseiten anzeigen',
    'OSC_PAYPAL_BANNER_CATEGORYPAGESELECTOR'        => 'CSS-Selektor der Kategorieseiten hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_CATEGORYPAGESELECTOR'   => 'Standardwert für das Theme "Apex": \'.list-header\'. Standardwert für das Theme "Wave": \'.page-header\'. Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_SEARCHRESULTSPAGE'           => 'Ratenzahlung-Banner bei Suchergebnissen anzeigen',
    'OSC_PAYPAL_BANNER_SEARCHRESULTSPAGESELECTOR'   => 'CSS-Selektor der Suchergebnisse hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_SEARCHRESULTSPAGESELECTOR' => 'Standardwert für das Theme "Apex" und "Wave": \'.list-header\'. Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_DETAILSPAGE'                 => 'Ratenzahlung-Banner auf Detailseiten anzeigen',
    'OSC_PAYPAL_BANNER_DETAILSPAGESELECTOR'         => 'CSS-Selektor der Detailseiten hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_DETAILSPAGESELECTOR'    => 'Standardwert für das Theme "Apex": \'.breadcrumb-wrapper > .container-xxl\'. Standardwert für das Theme "Wave": \'#breadcrumb\'.Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_CHECKOUTPAGE'                => 'Ratenzahlung-Banner im Warenkorb anzeigen',
    'OSC_PAYPAL_BANNER_CARTPAGESELECTOR'            => 'CSS-Selektor der Warenkorbübersicht (Bestellschritt 1) hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_CARTPAGESELECTOR'       => 'Standardwert für das Theme "Apex" und "Wave": \'#basket-paypal-installment-banner\'. Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_PAYMENTPAGESELECTOR'         => 'CSS-Selektor der Seite "Versand & Zahlungsart" (Bestellschritt 3) hinter dem das Banner angezeigt wird.',
    'HELP_OSC_PAYPAL_BANNER_PAYMENTPAGESELECTOR'    => 'Standardwert für das Theme "Apex": \'HEADER.header\'. Standardwert für das Theme "Wave": \'#shipping\'. Nach diesem CSS-Selektor wird das Banner angezeigt.',
    'OSC_PAYPAL_BANNER_COLORSCHEME'                 => 'Farbe des Ratenzahlung-Banners auswählen',
    'OSC_PAYPAL_BANNER_COLORSCHEMEBLUE'             => 'Blau',
    'OSC_PAYPAL_BANNER_COLORSCHEMEBLACK'            => 'Schwarz',
    'OSC_PAYPAL_BANNER_COLORSCHEMEWHITE'            => 'Weiß',
    'OSC_PAYPAL_BANNER_COLORSCHEMEGRAY'             => 'Grau',
    'OSC_PAYPAL_BANNER_COLORSCHEMEMONOCHROME'       => 'Einfarbig',
    'OSC_PAYPAL_BANNER_COLORSCHEMEGRAYSCALE'        => 'Graustufen',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME'              => 'PayPal Standard - Geldeinzug',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_LABEL'        => 'Nur für PayPal Standard ist ein abweichender Geldeinzug zum Bestellzeitpunkt möglich. Alle anderen Zahlarten (inkl. PayPal Express) werden sofort eingezogen.',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_HELP'         => 'Bitte beachten! Die Autorisierung einer Bestellung gilt drei Tage. Sie wird maximal bis 29 Tage nach Bestellung automatisch aufgefrischt. Anschließend ist ein Geldeinzug nicht mehr möglich.',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_DIRECTLY'     => 'Direkt',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_DELIVERY'     => 'automatisch bei Lieferung',
    'OSC_PAYPAL_STANDARD_CAPTURE_TIME_MANUALLY'     => 'manuell',
    'OSC_PAYPAL_CAPTURE_DAYS_LEFT'                  => 'Noch %s Tage Zeit, für den Geldeinzug',
    'OSC_PAYPAL_CAPTURE_NOT_POSSIBLE_ANYMORE'       => 'Zeit für Geldeinzug leider abgelaufen. Bitte kontaktieren Sie den Kunden um über Alternativen zu sprechen',

    'OSC_PAYPALPLUS_PAYMENT_OVERVIEW'               => 'Zahlungsübersicht',
    'OSC_PAYPALPLUS_PAYMENT_STATUS'                 => 'Zahlungsstatus',
    'OSC_PAYPALPLUS_ORDER_AMOUNT'                   => 'Bestellpreis gesamt',
    'OSC_PAYPALPLUS_REFUNDED_AMOUNT'                => 'Erstatteter Betrag',
    'OSC_PAYPALPLUS_PAYMENT_ID'                     => 'Bezahlung-ID',
    'OSC_PAYPALPLUS_PAYMENT_METHOD'                 => 'Zahlungsart',

    'OSC_PAYPALPLUS_PAYMENT_REFUNDING'              => 'Rückerstattungen',
    'OSC_PAYPALPLUS_AVAILABLE_REFUNDS'              => 'Anzahl verfügbarer Rückerstattungen:',
    'OSC_PAYPALPLUS_AVAILABLE_REFUND_AMOUNT'        => 'Verfügbarer Rückerstattungsbetrag:',
    'OSC_PAYPALPLUS_DATE'                           => 'Datum',
    'OSC_PAYPALPLUS_AMOUNT'                         => 'Betrag',
    'OSC_PAYPALPLUS_STATUS'                         => 'Status',
    'OSC_PAYPALPLUS_REFUND'                         => 'Erstatten',

    'OSC_PAYPALPLUS_PUI'                            => 'Rechnungskauf',
    'OSC_PAYPALPLUS_PUI_PAYMENT_INSTRUCTIONS'       => 'Zahlungshinweise',
    'OSC_PAYPALPLUS_PUI_TERM'                       => 'Zahlungsziel',
    'OSC_PAYPALPLUS_PUI_ACCOUNT_HOLDER'             => 'Empfänger',
    'OSC_PAYPALPLUS_PUI_BANK_NAME'                  => 'Bank',
    'OSC_PAYPALPLUS_PUI_REFERENCE_NUMBER'           => 'Verwendungszweck',
    'OSC_PAYPALPLUS_PUI_IBAN'                       => 'IBAN',
    'OSC_PAYPALPLUS_PUI_BIC'                        => 'BIC',

    'OSC_PAYPALSOAP_AMOUNT'                         => 'Betrag',
    'OSC_PAYPALSOAP_SHOP_PAYMENT_STATUS'            => 'Shop-Zahlungsstatus',
    'OSC_PAYPALSOAP_ORDER_PRICE'                    => 'Bestellpreis gesamt',
    'OSC_PAYPALSOAP_ORDER_PRODUCTS'                 => 'Bestellte Artikel',
    'OSC_PAYPALSOAP_CAPTURED'                       => 'Eingezogen',
    'OSC_PAYPALSOAP_REFUNDED'                       => 'Erstattet',
    'OSC_PAYPALSOAP_CAPTURED_NET'                   => 'Resultierender Zahlungsbetrag',
    'OSC_PAYPALSOAP_CAPTURED_AMOUNT'                => 'Eingezogener Betrag',
    'OSC_PAYPALSOAP_REFUNDED_AMOUNT'                => 'Erstatteter Betrag',
    'OSC_PAYPALSOAP_VOIDED_AMOUNT'                  => 'Stornierter Betrag',
    'OSC_PAYPALSOAP_CAPTURE'                        => 'Einziehen',
    'OSC_PAYPALSOAP_REFUND'                         => 'Erstatten',
    'OSC_PAYPALSOAP_AUTHORIZATION'                  => 'Autorisierung',
    'OSC_PAYPALSOAP_PAYMENT_HISTORY'                => 'PayPal-Historie',
    'OSC_PAYPALSOAP_HISTORY_DATE'                   => 'Datum',
    'OSC_PAYPALSOAP_HISTORY_ACTION'                 => 'Aktion',
    'OSC_PAYPALSOAP_HISTORY_PAYPAL_STATUS'          => 'PayPal-Status',
    'OSC_PAYPALSOAP_HISTORY_PAYPAL_STATUS_HELP'     => 'Von PayPal zurückgegebener Zahlungsstatus. Für mehr Details siehe (nur Englisch): <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank" >PayPal Zahlungsstatus</a>',
    'OSC_PAYPALSOAP_STATUS_pending'                 => 'Ausstehend',
    'OSC_PAYPALSOAP_STATUS_completed'               => 'Abgeschlossen',
    'OSC_PAYPALSOAP_STATUS_failed'                  => 'Fehlgeschlagen',
    'OSC_PAYPALSOAP_STATUS_canceled'                => 'Abgebrochen',
    'OSC_PAYPALSOAP_COMMENT'                        => 'Kommentar',
    'OSC_PAYPALSOAP_AUTHORIZATIONID'                => 'Autorisierungs-ID',
    'OSC_PAYPALSOAP_TRANSACTIONID'                  => 'Transaktions-ID',
    'OSC_PAYPALSOAP_CORRELATIONID'                  => 'Korrelations-ID',

    'OSC_PAYPAL_ERROR_NOT_PAID_WITH_PAYPAL'         => 'Bestellung wurde nicht über das PayPal-Checkout-Modul bezahlt',
    'OSC_PAYPAL_ERROR_INVALID_RESOURCE_ID'          => 'Die PayPal-Checkout-Bestellung hat eine invalide Resource-ID',
    'OSC_PAYPAL_PAYPALPLUS_TABLE_DOES_NOT_EXISTS'   => 'Bestellung wurde mit dem PayPal-Plus-Modul bezahlt, aber die Datenbanken existieren nicht mehr',
    'OSC_PAYPAL_PAYPALSOAP_TABLE_DOES_NOT_EXISTS'   => 'Bestellung wurde mit dem PayPal-Soap-Modul bezahlt, aber die Datenbanken existieren nicht mehr',

    'OSC_PAYPAL_SCA_CONTINGENCY'                    => '3D Secure für Debit- und Kreditkarten',
    'OSC_PAYPAL_SCA_ALWAYS'                         => '3D Secure Abfrage für jede ACDC Transaktion',
    'OSC_PAYPAL_SCA_WHEN_REQUIRED'                  => '3D Secure Abfrage automatisch, Entscheidung liegt beim PayPal System',
    'OSC_PAYPAL_SCA_DISABLED'                       => '3D Secure Ergebnis ignorieren',
    'OSC_PAYPAL_SCA_CONTINGENCY_LABEL'              => 'Kreditkarten Sicherheit',
    'OSC_PAYPAL_SCA_CONTINGENCY_HELP'               => 'Die 3D Secure-Authentifizierung dient der direkten und sicheren Interaktion zwischen der ausstellenden Bank und dem Verbraucher.
                                                        Hierbei hat PayPal keinen Zugriff auf die Bankdaten des Karteninhabers, ist jedoch für die Herstellung einer sicheren Verbindung zwischen der ausstellenden Bank
                                                        und dem Kreditkarteninhaber verantwortlich. <br> Mit der Einstellung "3D Secure Abfrage automatisch" wird PayPal wird 3D Secure einführen,
                                                        sobald die entsprechenden Vorschriften wirksam werden.
                                                        Die Einstellung "3D Secure Abfrage für jede ACDC Transaktion" erzwingt die 3D Prüfung für jede ACDC Transaktion.',

    'OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS_TITLE' => 'Behandlung nicht beendeter Bestellungen',
    'OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS'       => 'Nicht beendete Bestellungen automatisch stornieren?',
    'HELP_OSC_PAYPAL_HANDLING_NOT_FINISHED_ORDERS'  => 'Bei einigen PayPal-Zahlungsarten muss frühzeitig eine Bestellung angelegt werden, damit sie mit PayPal verwendet werden kann.
                                                        Es kann passieren, dass Kunden während des Bezahlvorgangs den Prozess abbrechen und nicht wieder in den Shop zurück kehren. In dem Fall bleiben
                                                        nicht beendete Bestellungen übrig, die automatisch storniert werden können. Sie können alternaitv diese Bestellungen gern selbst kontrollieren und
                                                        händisch stornieren.',
    'OSC_PAYPAL_STARTTIME_CLEANUP_ORDERS'           => 'Startzeit für automatisches Stornieren',
    'HELP_OSC_PAYPAL_STARTTIME_CLEANUP_ORDERS'      => 'Wie alt müssen nicht beendete Bestellungen sein, damit sie frühestens automatisch storniert werden (in Minuten)?',
    'OSC_PAYPAL_EXPRESS_SHIPPING_TITLE'             => 'Pseudoversandkosten für PayPal Express',
    'OSC_PAYPAL_EXPRESS_SHIPPING_DESC'              => 'Die hier eingegebenen Pseudeversandkosten werden verwendet, wenn die Shopoption “Versandkosten auch dann berechnen, wenn der Kunde noch nicht eingeloggt ist” nicht aktiviert ist.',
    'OSC_PAYPAL_ORDER_MAIN_TRACKCARRIER_COUNTRY'    => 'Versanddienstleister (Land)',
    'OSC_PAYPAL_ORDER_MAIN_TRACKCARRIER_PROVIDER'   => 'Versanddienstleister (Anbieter)',
    'OSC_PAYPAL_TRACKCARRIER_GLOBAL'                => 'weltweit',

    'OSC_PAYPAL_VAULTING_TITLE'                     => 'PayPal Vaulting',
    'OSC_PAYPAL_VAULTING_ACTIVATE_VAULTING'         => 'PayPal Vaulting aktivieren',
    'HELP_OSC_PAYPAL_VAULTING_ACTIVATE_VAULTING'    => 'Wiederholungskäufe leicht gemacht: Mit PayPal können Sie die bevorzugten Zahlarten Ihrer Kund:innen sicher speichern und so eine schnelle und einfache
                                                        Kaufabwicklung ermöglichen. Mit ihren gespeicherten Zahlungsdaten können Kund:innen mit nur wenigen Klicks Wiederholungskäufe tätigen. Dies kann für Sie
                                                        eine höhere Checkout-Conversion bedeuten.',

    'OSC_PAYPAL_INSTALLPROCESS_FAILED'               => 'Da das Modul nicht korrekt per Composer installiert ist, sind Fehler bei der (De-)Aktivierung des Moduls aufgetreten. Bitte installieren Sie das Modul via Composer frisch und wiederholen den Vorgang.',

    'OSC_PAYPAL_CUSTOM_ID_CONTENTS_TITLE'            => 'PayPal Inhalte des benutzerdefinierten ID-Feldes',
    'OSC_PAYPAL_CUSTOM_ID_CONTENTS_DESC'             => 'Das benutzerdefinierte PayPal-ID-Feld kann entweder nur den Bestellnummernwert oder ein JSON mit zusätzlichen Daten enthalten.',
];
