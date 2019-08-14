<?php

namespace App\Entity\DiscountedProduct\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'discounted-products';
    }

    public function getNew()
    {
        return 'discounted-products/new';
    }

    public function getEdit()
    {
        return 'discounted-products/{discountedProduct}';
    }
}
