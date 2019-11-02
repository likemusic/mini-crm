<?php

namespace App\Contract\Entity\ExchangeRate\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::EXCHANGE_RATE . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::EXCHANGE_RATE . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::EXCHANGE_RATE . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::EXCHANGE_RATE . '.' . PostfixInterface::DELETE;
}
