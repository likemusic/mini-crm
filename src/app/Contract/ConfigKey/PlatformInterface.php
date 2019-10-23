<?php

namespace App\Contract\ConfigKey;

use App\Contract\ConfigKeyInterface;

interface PlatformInterface
{
    const INDEX = ConfigKeyInterface::PLATFORM . '.' . SlugInterface::INDEX;
}
