<?php

namespace App\Entity\ProductCategory\Screens;

use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
