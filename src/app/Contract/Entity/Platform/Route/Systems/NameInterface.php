<?php

namespace App\Contract\Entity\Platform\Route\Systems;

use App\Contract\Entity\Platform\Route\NameInterface as PlatformRouteNameInterface;

interface NameInterface
{
    const RELATION_WITH_DATA = PlatformRouteNameInterface::SYSTEMS . '.' . SlugInterface::RELATION_WITH_DATA;
}
