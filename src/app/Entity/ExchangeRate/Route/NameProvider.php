<?php

namespace App\Entity\ExchangeRate\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;

class NameProvider extends BaseNameProvider
{
    protected function getEntityRouteName(): string
    {
        return 'exchange-rate';
    }
}
