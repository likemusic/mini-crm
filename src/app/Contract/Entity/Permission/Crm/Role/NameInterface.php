<?php

namespace App\Contract\Entity\Permission\Crm\Role;

use App\Contract\Entity\Permission\Crm\NameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::ROLE . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::ROLE . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::ROLE . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::ROLE . '.' . PostfixInterface::DELETE;
}
