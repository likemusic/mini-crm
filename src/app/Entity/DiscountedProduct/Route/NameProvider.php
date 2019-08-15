<?php

namespace App\Entity\DiscountedProduct\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;

class NameProvider extends BaseNameProvider
{
    protected function getEntityRouteName(): string
    {
        return 'discounted-product';
    }
}
