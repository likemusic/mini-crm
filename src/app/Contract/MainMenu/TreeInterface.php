<?php

namespace App\Contract\MainMenu;

use App\Contract\MainMenu\NotRoot\NameInterface as NotRootNameInterface;
use App\Contract\MainMenu\Root\NameInterface as RootNameInterface;

interface TreeInterface
{
    const TREE = [
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
        ]
    ];
}
