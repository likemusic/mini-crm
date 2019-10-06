<?php

namespace App\Contract\Entity\Order\Field;

interface NameInterface
{
    const ID = 'id';

    const DATE = 'date';
    const DATE_ORDER_ID = 'date_order_id';

    const PROVIDER_ID = 'provider_id';
//    const ITEM = 'item';

    const PRODUCT_QUOTE_ID = 'product_quote_id';

    const COUNT = 'count';
    const AMOUNT = 'amount';

    const BUYER = 'buyer';

    const INCOMES = 'incomes';

    const IMEI = 'imei';

    const COURIER_ID = 'courier';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
