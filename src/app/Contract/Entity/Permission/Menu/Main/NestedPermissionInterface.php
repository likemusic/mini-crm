<?php

namespace App\Contract\Entity\Permission\Menu\Main;

use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as ProductCategoryNameInterface;
use \App\Contract\Entity\Permission\Crm\Product\NameInterface as ProductNameInterface;

interface NestedPermissionInterface
{
    const PRODUCT_CATALOG = [
        ProductNameInterface::LIST,
        ProductCategoryNameInterface::LIST,
    ];
}
