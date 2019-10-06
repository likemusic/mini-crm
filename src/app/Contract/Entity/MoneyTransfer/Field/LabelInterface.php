<?php

namespace App\Contract\Entity\MoneyTransfer\Field;

interface LabelInterface
{
    const ID = 'Id';
    const OUTCOME_MONEY_CHANGE_ID = 'Id изменения баланса отправителя';
    const INCOME_MONEY_CHANGE_ID = 'Id изменения баланса получателя';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
