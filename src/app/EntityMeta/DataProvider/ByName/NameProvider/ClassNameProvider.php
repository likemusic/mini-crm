<?php

namespace App\EntityMeta\DataProvider\ByName\NameProvider;

use App\Base\DataProvider\ClassNameProvider as BaseClassNameProvider;
use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\NamesProviderInterface;

class ClassNameProvider extends BaseClassNameProvider
{
    protected function getMap(): array
    {
        return [
            EntityNameInterface::PRODUCT => NamesProviderInterface::PRODUCT,
            EntityNameInterface::ROLE => NamesProviderInterface::ROLE,
        ];
    }
}
