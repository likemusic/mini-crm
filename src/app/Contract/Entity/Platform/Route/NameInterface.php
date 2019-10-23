<?php

namespace App\Contract\Entity\Platform\Route;

use App\Contract\Entity\Platform\RouteInterface;

interface NameInterface
{
    const INDEX = RouteInterface::NAME . '.' . SlugInterface::INDEX;
    const MAIN = RouteInterface::NAME . '.' . SlugInterface::MAIN;
    const EMAIL = RouteInterface::NAME . '.' . SlugInterface::EMAIL;
    const SYSTEMS = RouteInterface::NAME . '.' . SlugInterface::SYSTEMS;
}
