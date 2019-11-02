<?php

namespace App\Entity\Role\Screens;

use App\Contract\Entity\Role\Permission\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
