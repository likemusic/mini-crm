<?php

namespace App\Contract\Entity\ExchangeRate\Field;

interface LabelInterface
{
    const ID = 'Id';
    const FROM_CURRENCY_CODE = 'Исходная валюта';
    const TO_CURRENCY_CODE = 'Конечная валюта';
    const RATE = 'Курс';
    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
