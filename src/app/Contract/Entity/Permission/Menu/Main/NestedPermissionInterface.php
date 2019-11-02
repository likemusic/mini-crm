<?php

namespace App\Contract\Entity\Permission\Menu\Main;

use App\Contract\Entity\ProductCategory\Permission\NameInterface as ProductCategoryNameInterface;
use App\Contract\Entity\Product\Permission\NameInterface as ProductNameInterface;

interface NestedPermissionInterface
{
    const PRODUCT_CATALOG = [
        ProductNameInterface::LIST,
        ProductCategoryNameInterface::LIST,
    ];
}
