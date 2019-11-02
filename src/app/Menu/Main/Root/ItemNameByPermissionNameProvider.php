<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\Root\ItemNameToPermissionNameMapInterface;

class ItemNameByPermissionNameProvider
{
    public function getItemNameByPermissionName($permissionName)
    {
        $map = ItemNameToPermissionNameMapInterface::MAP;

        $itemName = array_search($permissionName, $map);

        if (!$itemName) {
            throw new \InvalidArgumentException('Invalid root menu item permission name: '. $permissionName);
        }

        return $itemName;
    }
}
