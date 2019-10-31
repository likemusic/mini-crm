<?php

namespace App\Entity\ExchangeRate\MainMenu;

use App\Entity\Base\MainMenu\Registrar as BaseRegistrar;
use App\Entity\ExchangeRate\MainMenu\ItemData as MenuItemData;

class Registrar extends BaseRegistrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
