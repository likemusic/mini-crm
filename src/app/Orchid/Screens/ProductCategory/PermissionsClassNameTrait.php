<?php

namespace App\Orchid\Screens\ProductCategory;

use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
