<?php

namespace App\Contract\Entity\Settings\Permission;

use App\Contract\Entity\PermissionNameInterface as CrmNameInterface;
use App\Contract\Entity\Permission\Base\Entity\PostfixInterface;

interface NameInterface
{
    const LIST = CrmNameInterface::SETTINGS . '.' . PostfixInterface::LIST;
    const UPDATE = CrmNameInterface::SETTINGS . '.' . PostfixInterface::UPDATE;
}
