<?php

namespace App\Entity\Product;

use App\Contract\Entity\Product\Permission\NameInterface as PermissionNameInterface;
use App\Entity\Base\PermissionProvider as BasePermissionProvider;

class PermissionsProvider extends BasePermissionProvider
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
