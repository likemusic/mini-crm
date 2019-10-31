<?php

namespace App\Entity\Product\Screens;

use App\Contract\Entity\Permission\Crm\Product\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
