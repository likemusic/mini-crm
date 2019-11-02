<?php

namespace App\Contract\Entity\Warehouse\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::WAREHOUSE . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::WAREHOUSE . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::WAREHOUSE . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::WAREHOUSE . '.' . PostfixInterface::DELETE;
}
