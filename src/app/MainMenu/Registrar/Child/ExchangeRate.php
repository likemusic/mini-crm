<?php

namespace App\MainMenu\Registrar\Child;

use App\MainMenu\ItemData\EntityBased\ExchangeRate as MenuItemData;

class ExchangeRate extends Base
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
