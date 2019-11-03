<?php

namespace App\Menu\Main;

use App\Contract\MainMenu\StructureProviderInterface;

use App\Contract\MainMenu\NotRoot\NameInterface as NotRootNameInterface;
use App\Contract\MainMenu\Root\NameInterface as RootNameInterface;

class StructureProvider implements StructureProviderInterface
{
    public function getTree(): array
    {
        return [
            RootNameInterface::PRODUCT_CATALOG => [
                NotRootNameInterface::PRODUCTS,
                NotRootNameInterface::CATEGORIES,
            ],

            RootNameInterface::USERS_AND_ROLES => [
                NotRootNameInterface::USERS,
                NotRootNameInterface::ROLES,
            ],

            RootNameInterface::CURRENCIES_AND_EXCHANGE_RATES => [
                NotRootNameInterface::CURRENCIES,
            ],

            RootNameInterface::OTHER => [
                NotRootNameInterface::SETTINGS,
            ]
        ];
    }
}
