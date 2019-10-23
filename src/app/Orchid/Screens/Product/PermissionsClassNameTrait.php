<?php

namespace App\Orchid\Screens\Product;

use App\Contract\Entity\Permission\Crm\Product\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
