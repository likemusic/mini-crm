<?php

namespace App\Entity\ProductCategory;

use App\Contract\Entity\ProductCategory\Permission\NameInterface as PermissionNameInterface;
use App\Entity\Base\PermissionProvider as BasePermissionProvider;

class PermissionsProvider extends BasePermissionProvider
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
