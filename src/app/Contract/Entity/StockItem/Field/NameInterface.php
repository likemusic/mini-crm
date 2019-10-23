<?php

namespace App\Contract\Entity\StockItem\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const PRODUCT_ID = 'product_id';
    const PRODUCT = 'product';
    const WAREHOUSE_ID = 'warehouse_id';
    const WAREHOUSE = 'warehouse';
    const QUANTITY = 'quantity';
}
