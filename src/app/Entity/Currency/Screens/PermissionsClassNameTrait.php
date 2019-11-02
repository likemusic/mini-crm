<?php

namespace App\Entity\Currency\Screens;

use App\Contract\Entity\Currency\Permission\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
