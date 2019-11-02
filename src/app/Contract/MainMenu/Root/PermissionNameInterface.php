<?php

namespace App\Contract\MainMenu\Root;

use App\Contract\Entity\Permission\Menu\Main\SlugInterface;
use App\Contract\Entity\Permission\Menu\NameInterface as MenuNameInterface;

interface PermissionNameInterface
{
    const PRODUCT_CATALOG = MenuNameInterface::MAIN . '.' . SlugInterface::PRODUCT_CATALOG;
    const USERS_AND_ROLES = MenuNameInterface::MAIN . '.' . SlugInterface::USERS_AND_ROLES;
    const CURRENCIES_AND_EXCHANGE_RATES = MenuNameInterface::MAIN . '.' . SlugInterface::CURRENCIES_AND_EXCHANGE_RATES;
}
