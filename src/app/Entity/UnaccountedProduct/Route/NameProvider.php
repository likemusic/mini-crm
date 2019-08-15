<?php

namespace App\Entity\UnaccountedProduct\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;

class NameProvider extends BaseNameProvider
{
    protected function getEntityRouteName(): string
    {
        return 'unaccounted-product';
    }
}
