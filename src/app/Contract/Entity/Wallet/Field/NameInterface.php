<?php

namespace App\Contract\Entity\Wallet\Field;

use App\Contract\Entity\Base\Field\Name\NamedEntityInterface;

interface NameInterface extends NamedEntityInterface
{
    const OWNER = 'owner';
    const OWNER_ID = 'owner_id';
    const OWNER_TYPE = 'owner_type';

    const CURRENCY_CODE = 'currency_code';
    const AMOUNT = 'amount';
}
