<?php

namespace App\Contract\Entity\StockItem\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const PRODUCT_ID = 'Id товара';
    const PRODUCT_NAME = 'Название товара';
    const WAREHOUSE_ID = 'Id склада';
    const WAREHOUSE_CODE = 'Код склада';
    const QUANTITY = 'Кол-во';

    const NOTE = 'Примечание';
}
