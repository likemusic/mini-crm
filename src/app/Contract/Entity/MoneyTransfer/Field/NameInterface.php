<?php

namespace App\Contract\Entity\MoneyTransfer\Field;

interface NameInterface
{
    const ID = 'id';
    const INCOME_MONEY_CHANGE_ID = 'income_money_change_id';
    const OUTCOME_MONEY_CHANGE_ID = 'outcome_money_change_id';

    const NOTE = 'note';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
