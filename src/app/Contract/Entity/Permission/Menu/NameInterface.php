<?php

namespace App\Contract\Entity\Permission\Menu;

use App\Contract\Entity\Permission\NameInterface as PermissionNameInterface;

interface NameInterface
{
    const MAIN = PermissionNameInterface::MENU . '.main';
}
