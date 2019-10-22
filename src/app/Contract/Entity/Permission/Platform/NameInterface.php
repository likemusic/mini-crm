<?php


namespace App\Contract\Entity\Permission\Platform;

use App\Contract\Entity\Permission\NameInterface as PermissionNameInterface;

interface NameInterface
{
    const INDEX = PermissionNameInterface::PLATFORM . '.index';
    const SYSTEMS = PermissionNameInterface::PLATFORM . '.systems';
}
