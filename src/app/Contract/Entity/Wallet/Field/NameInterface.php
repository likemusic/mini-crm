<?php

namespace App\Contract\Entity\Wallet\Field;

interface NameInterface
{
    const ID = 'id';
    const NAME = 'name';

    const OWNER = 'owner';
    const OWNER_ID = 'owner_id';
    const OWNER_TYPE = 'owner_type';

    const CURRENCY_CODE = 'currency_code';
    const AMOUNT = 'amount';
    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
