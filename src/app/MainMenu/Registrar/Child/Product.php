<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\Product\MainMenu\ItemData as MenuItemData;

class Product extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
