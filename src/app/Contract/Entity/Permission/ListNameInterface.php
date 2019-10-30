<?php

namespace App\Contract\Entity\Permission;

use App\Contract\Entity\Permission\Crm\Product\NameInterface as ProductNameInterface;
use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as ProductCategoryNameInterface;
use App\Contract\Entity\Permission\Crm\Role\NameInterface as RoleNameInterface;
use App\Contract\Entity\Permission\Crm\User\NameInterface as UserNameInterface;

interface ListNameInterface
{
    const PRODUCT = ProductNameInterface::LIST;
    const PRODUCT_CATEGORY = ProductCategoryNameInterface::LIST;
    const ROLE = RoleNameInterface::LIST;
    const USER = UserNameInterface::LIST;
}
