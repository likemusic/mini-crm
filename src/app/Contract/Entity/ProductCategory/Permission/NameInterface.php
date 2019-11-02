<?php

namespace App\Contract\Entity\ProductCategory\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::PRODUCT_CATEGORY . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::PRODUCT_CATEGORY . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::PRODUCT_CATEGORY . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::PRODUCT_CATEGORY . '.' . PostfixInterface::DELETE;
}
