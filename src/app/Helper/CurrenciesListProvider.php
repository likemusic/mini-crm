<?php

namespace App\Helper;

use App\Contract\Domain\CurrencyInterface;
use ReflectionClass;

class CurrenciesListProvider
{
    public function getCurrenciesList()
    {
        $reflector = new ReflectionClass(CurrencyInterface::class);

        return $reflector->getConstants();
    }
}
