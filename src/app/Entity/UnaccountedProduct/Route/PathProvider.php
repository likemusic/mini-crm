<?php

namespace App\Entity\UnaccountedProduct\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'unaccounted-products';
    }

    public function getNew()
    {
        return 'unaccounted-products/new';
    }

    public function getEdit()
    {
        return 'unaccounted-products/{unaccounted-product}';
    }
}
