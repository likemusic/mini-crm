<?php

namespace App\Contract\Entity\Wallet\Field;

interface LabelInterface
{
    const ID = 'Id';

    const NAME = 'Название';

    const OWNER_ID = 'Id владельца';
    const OWNER = 'Владелец';

    const CURRENCY_CODE = 'Валюта';
    const AMOUNT = 'Сумма';
    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
