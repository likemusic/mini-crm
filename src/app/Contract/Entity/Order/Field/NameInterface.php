<?php

namespace App\Contract\Entity\Order\Field;

interface NameInterface
{
    const ID = 'id';

    const DATETIME = 'datetime';
    const DATE_ORDER_ID = 'date_order_id';

    const PRODUCT_ID = 'product_id';
    const PRODUCT_QUOTE_ID = 'product_quote_id';
    const IMEIES = 'imeies';

    const COUNT = 'count';
    const AMOUNT = 'amount';

    const PROVIDER_ID = 'provider_id';
    const BUYER_ID = 'buyer_id';

    const COURIER_ID = 'courier';

    const INCOMES = 'incomes';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
