<?php

namespace App\Contract\Entity\Order\Field;

interface NameInterface
{
    const ID = 'id';
    const ITEMS = 'items';
    const TOTAL_AMOUNT = 'total_amount';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
