<?php

namespace App\Contract\Entity\ExchangeRate\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const FROM_CURRENCY_ID = 'from_currency_id';
    const FROM_CURRENCY = 'fromCurrency';
    const TO_CURRENCY_ID = 'to_currency_id';
    const TO_CURRENCY = 'toCurrency';
    const RATE = 'rate';
}
