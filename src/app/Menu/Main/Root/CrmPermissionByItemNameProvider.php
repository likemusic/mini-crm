<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\Root\ItemNameToPermissionNameMapInterface;

class CrmPermissionByItemNameProvider
{
    public function getPermissionByName(string $rootMenuItemName): string
    {
        $map = ItemNameToPermissionNameMapInterface::MAP;

        if (!array_key_exists($rootMenuItemName, $map)) {
            throw new \InvalidArgumentException('Invalid root menu item name: '. $rootMenuItemName);
        }

        return $map[$rootMenuItemName];
    }
}
