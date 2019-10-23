<?php

namespace App\Contract\Entity\MoneyTransfer\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;

interface LabelInterface extends EntityInterface
{
    const OUTCOME_MONEY_CHANGE_ID = 'Id изменения баланса отправителя';
    const INCOME_MONEY_CHANGE_ID = 'Id изменения баланса получателя';
}
