<?php

namespace App\MainMenu\Registrar\Child;

use App\MainMenu\ItemData\EntityBased\Role as MenuItemData;

class Role extends Base
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
