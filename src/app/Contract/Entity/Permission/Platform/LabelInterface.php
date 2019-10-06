<?php

namespace App\Contract\Entity\Permission\Platform;

interface LabelInterface
{
    const INDEX = 'Main';
    const SYSTEMS = 'Systems';
    const SYSTEMS_INDEX = 'Settings';
    const SYSTEMS_ROLES = 'Roles';
    const SYSTEMS_USERS = 'Users';
    const SYSTEMS_ATTACHMENT = 'platform.systems.attachment';
    const SYSTEMS_ANNOUNCEMENT = 'platform.systems.announcement';
}
