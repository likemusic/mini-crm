<?php

namespace App\Contract\Entity\OrderItem\Field;

interface LabelInterface
{
    const ID = 'Id';

    const PRODUCT_QUOTE = 'Снимок товара';
    const PRODUCT_QUOTE_ID = 'Id снимка товара';

    const SELLING_PRICE = 'Отпускная цена';
    const COUNT = 'Количество';
    const AMOUNT = 'Сумма';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
