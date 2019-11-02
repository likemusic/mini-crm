<?php

namespace App\Entity\Product\Screens;

use App\Contract\Entity\Product\Permission\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
