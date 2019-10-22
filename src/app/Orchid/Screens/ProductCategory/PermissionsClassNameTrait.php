<?php

namespace App\Orchid\Screens\ProductCategory;

use App\Contract\Entity\Permission\Crm\Product\Category\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
