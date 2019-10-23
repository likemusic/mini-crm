<?php

namespace App\Contract\Entity\MoneyChange\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const WALLET_ID = 'Id кошелька';
    const AMOUNT = 'Сумма';

    const NOTE = 'Примечание';
}
