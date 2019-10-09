<?php

namespace App\Contract\Entity\Order\Field;

interface LabelInterface
{
    const ID = 'Id';

    const DATETIME = 'Дата и время заказа';
    const DATE_ORDER_ID = 'Номер заказа за день';

    const PRODUCT_QUOTE_ID = 'Id снимка товара';
    const PRODUCT_QUOTE = 'Снимок товара';

    const IMEIES = 'IMEI коды';

    const COUNT = 'Кол-во';
    const AMOUNT = 'Общая сумма';

    const PROVIDER_ID = 'Id поставщика';
    const PROVIDER = 'Поставщик';

    const BUYER_ID = 'Id покупателя';
    const BUYER = 'Покупатель';

    const COURIER_ID = 'Id курьера';
    const COURIER = 'Курьер';

    const INCOMES = 'Поступления';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
