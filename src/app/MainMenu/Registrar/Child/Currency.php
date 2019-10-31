<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\Currency\MainMenu\ItemData as MenuItemData;

class Currency extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
