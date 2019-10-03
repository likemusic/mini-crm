<?php

namespace App\Contract\Entity\Platform;

/**
 * Interface PermissionInterface
 */
interface PermissionInterface
{
    const INDEX = 'platform.index';
    const SYSTEMS = 'platform.systems';
    const SYSTEMS_INDEX = 'platform.systems.index';
    const SYSTEMS_ROLES = 'platform.systems.roles';
    const SYSTEMS_USERS = 'platform.systems.users';
    const SYSTEMS_ATTACHMENT = 'platform.systems.attachment';
    const SYSTEMS_ANNOUNCEMENT = 'platform.systems.announcement';
}
