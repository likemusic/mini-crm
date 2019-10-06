<?php

namespace App\Contract\Entity\MoneyChange\Field;

interface NameInterface
{
    const ID = 'id';
    const WALLET_ID = 'wallet_id';
    const AMOUNT = 'amount';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
