<?php

namespace App\Orchid\Screens\Currency;

use App\Contract\Entity\Permission\Crm\Currency\NameInterface as PermissionNameInterface;

trait PermissionsClassNameTrait
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
