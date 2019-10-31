<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\ProductCategory\MainMenu\ItemData as MenuItemData;

class ProductCategory extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
