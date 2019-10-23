<?php

namespace App\Contract\Entity\Wallet\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';

    const NAME = 'Название';

    const OWNER_ID = 'Id владельца';
    const OWNER_TYPE = 'Тип владельца';

    const OWNER = 'Владелец';

    const CURRENCY_CODE = 'Валюта';
    const AMOUNT = 'Сумма';
    const NOTE = 'Примечание';
}
