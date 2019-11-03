<?php

namespace App\Contract\MainMenu\Root;

use App\Contract\MainMenu\Root\NameInterface as RootMenuItemNameInterface;

interface ItemNameToMenuRegistrarClassName
{
    const MAP = [
        RootMenuItemNameInterface::PRODUCT_CATALOG => RegistrarClassNameInterface::PRODUCT_CATALOG,
        RootMenuItemNameInterface::USERS_AND_ROLES => RegistrarClassNameInterface::USERS_AND_ROLES,
        RootMenuItemNameInterface::CURRENCIES_AND_EXCHANGE_RATES => RegistrarClassNameInterface::CURRENCIES_AND_EXCHANGE_RATES,
        RootMenuItemNameInterface::OTHER => RegistrarClassNameInterface::OTHER,
    ];
}
