<?php

namespace App\Entity\ExchangeRate\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;

class PathProvider extends BasePathProvider
{
    protected function getBasePath(): string
    {
        return 'exchange-rates';
    }
}
