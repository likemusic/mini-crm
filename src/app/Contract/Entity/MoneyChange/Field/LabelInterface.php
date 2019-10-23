<?php

namespace App\Contract\Entity\MoneyChange\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;

interface LabelInterface extends EntityInterface
{
    const WALLET_ID = 'Id кошелька';
    const AMOUNT = 'Сумма';
}
