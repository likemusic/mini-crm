<?php

namespace App\Helper;

use App\Contract\Entity\Base\Route\PathProviderInterface;
use App\Orchid\Screens\Base\ListScreen;
use App\Contract\Entity\Base\Route\NameProviderInterface;

class RouteRegisterHelper
{
    public function addRoutes(
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName
    ) {

    }
}
