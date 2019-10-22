<?php

namespace App\Contract\Entity\Permission\Crm;

use App\Contract\Entity\Permission\NameInterface as PermissionNameInterface;

interface NameInterface
{
    const PRODUCT = PermissionNameInterface::CRM . '.product';
    const ROLE = PermissionNameInterface::CRM . '.role';
}
