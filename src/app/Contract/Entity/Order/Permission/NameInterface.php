<?php

namespace App\Contract\Entity\Order\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::ORDER . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::ORDER . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::ORDER . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::ORDER . '.' . PostfixInterface::DELETE;
}
