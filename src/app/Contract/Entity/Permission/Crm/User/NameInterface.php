<?php

namespace App\Contract\Entity\Permission\Crm\User;

use App\Contract\Entity\Permission\Crm\NameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::USER . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::USER . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::USER . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::USER . '.' . PostfixInterface::DELETE;
}
