<?php

namespace App\Contract\Entity\ExchangeRate\Field;

interface NameInterface
{
    const ID = 'id';

    const FROM_CURRENCY_CODE = 'from_currency_code';
    const TO_CURRENCY_CODE = 'to_currency_code';
    const RATE = 'rate';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
