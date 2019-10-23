<?php

namespace App\Contract\Entity\StockItem\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;
use App\Contract\Entity\Base\Field\Label\TimestampsInterface;

interface LabelInterface extends EntityInterface
{
    const PRODUCT_ID = 'Id товара';
    const PRODUCT_NAME = 'Название товара';
    const WAREHOUSE_ID = 'Id склада';
    const WAREHOUSE_CODE = 'Код склада';
    const QUANTITY = 'Кол-во';
}
