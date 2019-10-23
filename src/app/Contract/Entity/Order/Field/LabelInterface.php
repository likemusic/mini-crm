<?php

namespace App\Contract\Entity\Order\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;

interface LabelInterface extends EntityInterface
{
    const DATETIME = 'Дата и время заказа';
    const DATE_ORDER_ID = 'Номер заказа за день';

    const PRODUCT = 'Товар';
    const PRODUCT_ID = 'Id товара';
    const PRODUCT_QUOTE_ID = 'Id снимка товара';
    const PRODUCT_QUOTE = 'Снимок товара';

    const IMEIES = 'IMEI коды';

    const COUNT = 'Кол-во';
    const ITEM_PRICE = 'Цена за шт., $';
    const AMOUNT = 'Общая сумма';

    const PROVIDER_ID = 'Id поставщика';
    const PROVIDER = 'Поставщик';

    const BUYER_ID = 'Id покупателя';
    const BUYER = 'Покупатель';

    const COURIER_ID = 'Id курьера';
    const COURIER = 'Курьер';

    const INCOMES = 'Поступления';
}
