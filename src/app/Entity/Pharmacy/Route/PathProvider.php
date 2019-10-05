<?php

namespace App\Entity\Pharmacy\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;

class PathProvider extends BasePathProvider
{
    protected function getBasePath(): string
    {
        return 'pharmacy';
    }
}
