<?php

namespace App\Contract\Entity\MoneyTransfer\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const INCOME_MONEY_CHANGE_ID = 'income_money_change_id';
    const OUTCOME_MONEY_CHANGE_ID = 'outcome_money_change_id';
}
