<?php

namespace App\Contract\Entity\Permission;

use App\Contract\Entity\Product\Permission\NameInterface as ProductNameInterface;
use App\Contract\Entity\ProductCategory\Permission\NameInterface as ProductCategoryNameInterface;
use App\Contract\Entity\Role\Permission\NameInterface as RoleNameInterface;
use App\Contract\Entity\User\Permission\NameInterface as UserNameInterface;
use App\Contract\Entity\Currency\Permission\NameInterface as CurrencyNameInterface;

interface ListNameInterface
{
    const PRODUCT = ProductNameInterface::LIST;
    const PRODUCT_CATEGORY = ProductCategoryNameInterface::LIST;
    const ROLE = RoleNameInterface::LIST;
    const USER = UserNameInterface::LIST;
    const CURRENCY = CurrencyNameInterface::LIST;
}
