<?php

namespace App\Contract\MainMenu\NotRoot;

use App\Contract\MainMenu\NotRoot\NameInterface as NotRootMenuItemNameInterface;

interface ItemNameToMenuRegistrarClassName
{
    const MAP = [
        NotRootMenuItemNameInterface::PRODUCTS => RegistrarClassNameInterface::PRODUCTS,
        NotRootMenuItemNameInterface::CATEGORIES => RegistrarClassNameInterface::CATEGORIES,
        NotRootMenuItemNameInterface::USERS => RegistrarClassNameInterface::USERS,
        NotRootMenuItemNameInterface::ROLES => RegistrarClassNameInterface::ROLES,
        NotRootMenuItemNameInterface::CURRENCIES => RegistrarClassNameInterface::CURRENCIES,
        NotRootMenuItemNameInterface::SETTINGS => RegistrarClassNameInterface::SETTINGS,
    ];
}
