<?php

namespace App\Base\DataProvider;

use App\Contract\Base\ClassNameProviderInterface;

abstract class ClassNameProvider extends DataProvider implements ClassNameProviderInterface
{
    public function getValueByKey(string $key): string
    {
        return parent::getValueByKey($key);
    }
}
