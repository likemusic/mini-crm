<?php

namespace App\Contract\Entity\Order\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const DATETIME = 'datetime';
    const DATE_ORDER_ID = 'date_order_id';

    const PRODUCT_ID = 'product_id';
    const PRODUCT_QUOTE_ID = 'product_quote_id';
    const IMEIES = 'imeies';

    const COUNT = 'count';
    const ITEM_PRICE = 'item_price';

    const AMOUNT = 'amount';

    const PROVIDER_ID = 'provider_id';
    const BUYER_ID = 'buyer_id';

    const COURIER_ID = 'courier';

    const INCOMES = 'incomes';
}
