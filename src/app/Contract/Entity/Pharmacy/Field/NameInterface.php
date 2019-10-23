<?php

namespace App\Contract\Entity\Pharmacy\Field;

use App\Contract\Entity\Base\Field\Name\IdInterface;
use App\Contract\Entity\Base\Field\Name\NameInterface as FieldNameNameInterface;

interface NameInterface extends IdInterface, FieldNameNameInterface
{
    const CATEGORY = 'category';
    const CATEGORY_ID = 'category_id';
    const SELLING_PRICE = 'selling_price';
    const APPROXIMATE_PRICE = 'approximate_price';

    const WAREHOUSES_TOTAL_QUANTITY = 'warehouse_total_quantity';
    const WAREHOUSES_TOTAL_AMOUNT = 'warehouse_total_amount';
}
