<?php

namespace App\Entity\ExchangeRate;

use App\Contract\Entity\Permission\Crm\ExchangeRate\NameInterface as PermissionNameInterface;
use App\Entity\Base\PermissionProvider as BasePermissionProvider;

class PermissionsProvider extends BasePermissionProvider
{
    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}
