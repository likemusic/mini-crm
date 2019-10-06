<?php

namespace App\Contract\Entity\MoneyChange\Field;

interface LabelInterface
{
    const ID = 'Id';
    const WALLET_ID = 'Id кошелька';
    const AMOUNT = 'Сумма';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
