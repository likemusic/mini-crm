<?php

namespace App\Orchid\Screens\Role;

use App\Contract\Entity\Permission\Crm\Role\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
