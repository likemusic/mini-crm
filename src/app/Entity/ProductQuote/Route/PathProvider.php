<?php

namespace App\Entity\ProductQuote\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'product-quotes';
    }

    public function getNew()
    {
        return 'product-quotes/new';
    }

    public function getEdit()
    {
        return 'product-quotes/{productQuote}';
    }
}
