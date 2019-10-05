<?php

namespace App\Contract\Entity\StockItem\Field;

interface LabelInterface
{
    const ID = 'Id';
    const PRODUCT_ID = 'Id товара';
    const PRODUCT_NAME = 'Название товара';
    const WAREHOUSE_ID = 'Id склада';
    const WAREHOUSE_CODE = 'Код склада';
    const QUANTITY = 'Кол-во';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
