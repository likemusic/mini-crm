<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\ExchangeRate\MainMenu\ItemData as MenuItemData;

class ExchangeRate extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
