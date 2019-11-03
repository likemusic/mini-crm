<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\Root\ItemNameToMenuRegistrarClassName;

class ItemNameByMenuRegistrarClassNameProvider
{
    public function getItemNameByMenuRegistrarClassName($menuRegistrarClassName)
    {
        $map = ItemNameToMenuRegistrarClassName::MAP;

        $itemName = array_search($menuRegistrarClassName, $map);

        if (!$itemName) {
            throw new \InvalidArgumentException('Invalid root menu registrar class name: '. $menuRegistrarClassName);
        }

        return $itemName;
    }
}
