<?php

namespace App\MainMenu\Registrar\Child;

use App\Entity\User\MainMenu\User as MenuItemData;

class User extends Registrar
{
    public function __construct(MenuItemData $itemData)
    {
        parent::__construct($itemData);
    }
}
