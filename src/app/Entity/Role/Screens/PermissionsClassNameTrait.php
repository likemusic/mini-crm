<?php

namespace App\Entity\Role\Screens;

use App\Contract\Entity\Permission\Crm\Role\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
