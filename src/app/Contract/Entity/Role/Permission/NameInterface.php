<?php

namespace App\Contract\Entity\Role\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::ROLE . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::ROLE . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::ROLE . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::ROLE . '.' . PostfixInterface::DELETE;
}
