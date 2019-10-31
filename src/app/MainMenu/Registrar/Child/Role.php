<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\Role\MainMenu\ItemData as MenuItemData;

class Role extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
