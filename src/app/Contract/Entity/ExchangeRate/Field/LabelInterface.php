<?php

namespace App\Contract\Entity\ExchangeRate\Field;

interface LabelInterface
{
    const ID = 'Id';

    const FROM_CURRENCY_ID = 'Id исходной валюты';
    const FROM_CURRENCY_CODE = 'Код исходной валюты';

    const TO_CURRENCY_ID = 'Id конечной валюты';
    const TO_CURRENCY_CODE = 'Код конечной валюты';

    const RATE = 'Курс';
    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
