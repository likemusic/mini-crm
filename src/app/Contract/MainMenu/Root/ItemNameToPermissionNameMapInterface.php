<?php

namespace App\Contract\MainMenu\Root;

use App\Contract\MainMenu\Root\PermissionNameInterface;
use App\Contract\MainMenu\Root\NameInterface as RootMenuItemNameInterface;

interface ItemNameToPermissionNameMapInterface
{
    const MAP = [
        RootMenuItemNameInterface::PRODUCT_CATALOG => PermissionNameInterface::PRODUCT_CATALOG,
        RootMenuItemNameInterface::USERS_AND_ROLES => PermissionNameInterface::USERS_AND_ROLES,
        RootMenuItemNameInterface::CURRENCIES_AND_EXCHANGE_RATES => PermissionNameInterface::CURRENCIES_AND_EXCHANGE_RATES,
    ];
}
