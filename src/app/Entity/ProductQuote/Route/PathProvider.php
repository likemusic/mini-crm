<?php

namespace App\Entity\ProductQuote\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;

class PathProvider extends BasePathProvider
{
    protected function getBasePath(): string
    {
        return 'product-quotes';
    }
}
