<?php

namespace App\Menu\Main\Base\AccessResolver;

use App\Common\User\GetCurrentUserTrait;

abstract class ByMenuItemName
{
    use GetCurrentUserTrait;

    abstract public function canAccess(string $menuItemName): bool;
}
