<?php

namespace App\Entity\Currency;

use App\Contract\Entity\Permission\Crm\Currency\NameInterface as PermissionNameInterface;
use App\Entity\Base\PermissionProvider as BasePermissionProvider;

class PermissionsProvider extends BasePermissionProvider
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}