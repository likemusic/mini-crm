<?php

namespace App\Entity\ProductCategory\Screens;

use App\Contract\Entity\ProductCategory\Permission\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
