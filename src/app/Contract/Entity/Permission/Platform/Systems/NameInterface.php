<?php

namespace App\Contract\Entity\Permission\Platform\Systems;

use App\Contract\Entity\Permission\Platform\NameInterface as PlatformNameInterface;

interface NameInterface
{
    const INDEX = PlatformNameInterface::SYSTEMS . '.index';
    const ROLES = PlatformNameInterface::SYSTEMS . '.roles';
    const USERS = PlatformNameInterface::SYSTEMS . '.users';
    const ATTACHMENT = PlatformNameInterface::SYSTEMS . '.attachment';
    const ANNOUNCEMENT = PlatformNameInterface::SYSTEMS . '.announcement';
}
