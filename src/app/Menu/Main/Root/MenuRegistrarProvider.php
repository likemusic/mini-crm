<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\Root\ItemNameToMenuRegistrarClassName;
use App\Menu\Main\Base\MenuRegistrarProvider as BaseMenuRegistrarProvider;

class MenuRegistrarProvider extends BaseMenuRegistrarProvider
{
    protected function getMap(): array
    {
        return ItemNameToMenuRegistrarClassName::MAP;
    }
}
