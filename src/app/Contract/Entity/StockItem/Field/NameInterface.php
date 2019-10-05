<?php

namespace App\Contract\Entity\StockItem\Field;

interface NameInterface
{
    const ID = 'id';
    const PRODUCT_ID = 'product_id';
    const PRODUCT = 'product';
    const WAREHOUSE_ID = 'warehouse_id';
    const WAREHOUSE = 'warehouse';
    const QUANTITY = 'quantity';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
