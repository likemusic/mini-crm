<?php

namespace App\Contract\Entity\OrderItem\Field;

interface NameInterface
{
    const ID = 'id';

    const ORDER_ID = 'order_id';
    const PRODUCT_QUOTE_ID = 'product_quote_id';

    const SELLING_PRICE = 'selling_price';
    const COUNT = 'count';
    const AMOUNT = 'amount';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
