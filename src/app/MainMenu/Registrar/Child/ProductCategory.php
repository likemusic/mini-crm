<?php

namespace App\MainMenu\Registrar\Child;

use App\MainMenu\ItemData\EntityBased\ProductCategory as MenuItemData;

class ProductCategory extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
