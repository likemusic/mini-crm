<?php

namespace App\Menu\Main\NotRoot;

use App\Contract\MainMenu\NotRoot\ItemNameToMenuRegistrarClassName;
use App\Menu\Main\Base\MenuRegistrarProvider as BaseMenuRegistrarProvider;

class MenuRegistrarProvider extends BaseMenuRegistrarProvider
{
    protected function getMap(): array
    {
        return ItemNameToMenuRegistrarClassName::MAP;
    }
}
