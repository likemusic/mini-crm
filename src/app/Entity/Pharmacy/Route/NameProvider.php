<?php

namespace App\Entity\Pharmacy\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;

class NameProvider extends BaseNameProvider
{
    protected function getEntityRouteName(): string
    {
        return 'pharmacy';
    }
}
