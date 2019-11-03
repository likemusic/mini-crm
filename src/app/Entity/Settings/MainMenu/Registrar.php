<?php

namespace App\Entity\Settings\MainMenu;

use App\Entity\Base\MainMenu\Registrar as BaseRegistrar;
use App\Entity\Settings\MainMenu\ItemData as MenuItemData;

class Registrar extends BaseRegistrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
