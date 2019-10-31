<?php

namespace App\MainMenu\Registrar\Child;

use App\MainMenu\ItemData\EntityBased\ExchangeRate as MenuItemData;

class ExchangeRate extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
