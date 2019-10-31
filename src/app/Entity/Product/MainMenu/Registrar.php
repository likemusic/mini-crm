<?php

namespace App\Entity\Product\MainMenu;

use App\Entity\Base\MainMenu\Registrar as BaseRegistrar;
use App\Entity\Product\MainMenu\ItemData as MenuItemData;

class Registrar extends BaseRegistrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
