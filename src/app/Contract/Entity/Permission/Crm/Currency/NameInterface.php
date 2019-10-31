<?php

namespace App\Contract\Entity\Permission\Crm\Currency;

use App\Contract\Entity\Permission\Crm\NameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::CURRENCY . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::CURRENCY . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::CURRENCY . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::CURRENCY . '.' . PostfixInterface::DELETE;
}
