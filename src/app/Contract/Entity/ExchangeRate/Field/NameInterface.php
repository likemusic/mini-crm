<?php

namespace App\Contract\Entity\ExchangeRate\Field;

interface NameInterface
{
    const ID = 'id';

    const FROM_CURRENCY_ID = 'from_currency_id';
    const FROM_CURRENCY = 'fromCurrency';
    const TO_CURRENCY_ID = 'to_currency_id';
    const TO_CURRENCY = 'toCurrency';
    const RATE = 'rate';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
