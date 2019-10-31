<?php

namespace App\Entity\Currency\Screens;

use App\Contract\Entity\Permission\Crm\Currency\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
