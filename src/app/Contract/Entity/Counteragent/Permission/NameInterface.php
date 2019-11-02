<?php

namespace App\Contract\Entity\Counteragent\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::COUNTERAGENT . '.' . PostfixInterface::LIST;
    const CREATE = CrmNameInterface::COUNTERAGENT . '.' . PostfixInterface::CREATE;
    const UPDATE = CrmNameInterface::COUNTERAGENT . '.' . PostfixInterface::UPDATE;
    const DELETE = CrmNameInterface::COUNTERAGENT . '.' . PostfixInterface::DELETE;
}
