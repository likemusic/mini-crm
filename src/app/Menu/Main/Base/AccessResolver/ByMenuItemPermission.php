<?php

namespace App\Menu\Main\Base\AccessResolver;

use App\Common\User\IsCurrentUserCanAccess;

abstract class ByMenuItemPermission
{
    use IsCurrentUserCanAccess;

    abstract public function canAccess(string $menuItemPermission): bool;
}
