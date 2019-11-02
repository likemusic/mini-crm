<?php

namespace App\Contract\Entity\Product\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::PRODUCT . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::PRODUCT . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::PRODUCT . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::PRODUCT . '.' . PostfixInterface::DELETE;
}
