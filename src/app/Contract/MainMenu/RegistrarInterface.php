<?php

namespace App\Contract\MainMenu;

use Orchid\Platform\Menu;

interface RegistrarInterface
{
    public function addMenu(Menu $menu, string $place = Menu::MAIN);
}
