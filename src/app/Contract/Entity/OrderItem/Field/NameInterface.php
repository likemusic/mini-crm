<?php

namespace App\Contract\Entity\OrderItem\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const ORDER_ID = 'order_id';
    const PRODUCT_QUOTE_ID = 'product_quote_id';

    const COUNT = 'count';
    const AMOUNT = 'amount';
}
