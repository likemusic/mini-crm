<?php

namespace App\Entity\Order\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;

class PathProvider extends BasePathProvider
{
    protected function getBasePath(): string
    {
        return 'orders';
    }
}
