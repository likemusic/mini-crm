<?php

namespace App\Contract\Entity\DiscountedProduct\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::DISCOUNTED_PRODUCT . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::DISCOUNTED_PRODUCT . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::DISCOUNTED_PRODUCT . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::DISCOUNTED_PRODUCT . '.' . PostfixInterface::DELETE;
}
