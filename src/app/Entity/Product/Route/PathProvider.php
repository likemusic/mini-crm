<?php

namespace App\Entity\Product\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'products';
    }

    public function getNew()
    {
        return 'products/new';
    }

    public function getEdit()
    {
        return 'products/{product}';
    }
}
