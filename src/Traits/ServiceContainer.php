<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Traits;

use OxidEsales\Eshop\Core\Database\Adapter\Doctrine\Database;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Application\ContainerFactory;
use OxidSolutionCatalysts\PayPal\Service\LanguageLocaleMapper;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;
use OxidSolutionCatalysts\PayPal\Service\OrderRepository;
use OxidSolutionCatalysts\PayPal\Service\Payment;
use OxidSolutionCatalysts\PayPal\Service\StaticContent;
use OxidSolutionCatalysts\PayPal\Service\UserRepository;
use OxidSolutionCatalysts\PayPal\Service\SCAValidator;
use OxidEsales\Eshop\Core\DatabaseProvider;

trait ServiceContainer
{
    protected $services = [];

    /**
     * @template T
     * @psalm-param class-string<T> $serviceName
     * @return T
     */
    protected function getServiceFromContainer(string $serviceName)
    {
        /** @var Database $database */
        $database = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);

        switch ($serviceName) {
            case 'OxidSolutionCatalysts\PayPal\Service\ModuleSettings':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\ModuleSettings'] =
                    new ModuleSettings(
                        Registry::getConfig(),
                        $database
                    );
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\OrderRepository':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\OrderRepository'] =
                    new OrderRepository(
                        Registry::getConfig(),
                        $database
                    );
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\Payment':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\Payment'] =
                    new Payment(
                        Registry::getSession(),
                        new OrderRepository(
                            Registry::getConfig(),
                            $database
                        ),
                        new SCAValidator(),
                        new ModuleSettings(
                            Registry::getConfig(),
                            $database
                        )
                    );
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\StaticContent':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\StaticContent'] =
                    new StaticContent(
                        Registry::getConfig(),
                        $database,
                        new ModuleSettings(
                            Registry::getConfig(),
                            $database
                        )
                    );
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\UserRepository':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\UserRepository'] =
                    new UserRepository(
                        Registry::getConfig(),
                        $database,
                        Registry::getSession()
                    );
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\SCAValidator':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\SCAValidator'] =
                    new SCAValidator();
                break;
            case 'OxidSolutionCatalysts\PayPal\Service\LanguageLocaleMapper':
                $result = $this->services['OxidSolutionCatalysts\PayPal\Service\LanguageLocaleMapper'] =
                    new LanguageLocaleMapper(
                        new ModuleSettings(
                            Registry::getConfig(),
                            $database
                        )
                    );
                break;
        }
        return $result;
    }
}
