<?php

namespace App\Menu\Main\NotRoot;

use App\Contract\MainMenu\NotRoot\NameInterface as MenuItemNameInterface;
use App\Contract\Entity\NameInterface as EntityNameInterface;

class EntityNameByMenuItemNameProvider
{
    private $menuItemNameToEntityNameMap = [
        MenuItemNameInterface::PRODUCTS => EntityNameInterface::PRODUCT,
        MenuItemNameInterface::CATEGORIES => EntityNameInterface::PRODUCT_CATEGORY,
        MenuItemNameInterface::USERS => EntityNameInterface::USER,
        MenuItemNameInterface::ROLES => EntityNameInterface::ROLE,
        MenuItemNameInterface::CURRENCIES => EntityNameInterface::CURRENCY,
    ];

    public function getEntityNameByMenuItemName(string $menuItemName): string
    {
        $map = $this->menuItemNameToEntityNameMap;

        if (!array_key_exists($menuItemName, $map)) {
            throw new \InvalidArgumentException('Invalid menu item name: '. $menuItemName);
        }

        return $map[$menuItemName];
    }
}
