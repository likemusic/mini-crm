<?php

namespace App\Contract\Entity\OrderItem\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;

interface LabelInterface extends EntityInterface
{
    const ORDER_ID = 'Id заказа';
    const ORDER = 'Заказ';

    const PRODUCT_QUOTE = 'Снимок товара';
    const PRODUCT_QUOTE_ID = 'Id снимка товара';

    const SELLING_PRICE = 'Отпускная цена';
    const COUNT = 'Количество';
    const AMOUNT = 'Сумма';
}
