<?php

namespace App\Contract\Entity\MoneyTransfer\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const OUTCOME_MONEY_CHANGE_ID = 'Id изменения баланса отправителя';
    const INCOME_MONEY_CHANGE_ID = 'Id изменения баланса получателя';

    const NOTE = 'Примечание';
}
