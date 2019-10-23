<?php

namespace App\Contract\Entity\Permission\Menu\Main;

use App\Contract\Entity\Permission\Menu\NameInterface as MenuNameInterface;

interface NameInterface
{
    const PRODUCT_CATALOG = MenuNameInterface::MAIN . '.' . SlugInterface::PRODUCT_CATALOG;
    const USERS_AND_ROLES = MenuNameInterface::MAIN . '.' . SlugInterface::USERS_AND_ROLES;
}
