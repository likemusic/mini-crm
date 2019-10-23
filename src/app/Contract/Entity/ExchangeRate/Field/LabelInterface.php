<?php

namespace App\Contract\Entity\ExchangeRate\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';

    const FROM_CURRENCY_ID = 'Id исходной валюты';
    const FROM_CURRENCY_CODE = 'Код исходной валюты';

    const TO_CURRENCY_ID = 'Id конечной валюты';
    const TO_CURRENCY_CODE = 'Код конечной валюты';

    const RATE = 'Курс';
    const NOTE = 'Примечание';
}
