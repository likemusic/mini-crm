<?php

namespace App\Contract\Entity\MoneyChange\Field;

use App\Contract\Entity\Base\Field\Name\EntityInterface;

interface NameInterface extends EntityInterface
{
    const WALLET_ID = 'wallet_id';
    const AMOUNT = 'amount';
}
