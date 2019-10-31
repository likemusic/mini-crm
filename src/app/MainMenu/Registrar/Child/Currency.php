<?php

namespace App\MainMenu\Registrar\Child;

use App\MainMenu\ItemData\EntityBased\Currency as MenuItemData;

class Currency extends Base
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
