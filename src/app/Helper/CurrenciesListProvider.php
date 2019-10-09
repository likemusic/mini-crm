<?php

namespace App\Helper;

use App\Contract\Domain\CurrencyCodeInterface;
use ReflectionClass;

class CurrenciesListProvider
{
    public function getCurrenciesList()
    {
        $reflector = new ReflectionClass(CurrencyCodeInterface::class);

        return $reflector->getConstants();
    }
}
