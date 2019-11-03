<?php

namespace App\Entity\Settings\Screens;

use App\Contract\Entity\Settings\Permission\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
