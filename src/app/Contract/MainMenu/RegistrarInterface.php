<?php

namespace App\Contract\MainMenu;

use Orchid\Platform\Menu;

interface RegistrarInterface
{
    public function registerIfHasAccess(Menu $menu, string $parentSlug = Menu::MAIN);
}
