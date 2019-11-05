<?php

namespace App\EntityMeta\DataProvider\Names;

use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Common\ReflectionHelper;

class AllNamesProvider
{
    private $reflectionHelper;

    public function __construct(ReflectionHelper $reflectionHelper)
    {
        $this->reflectionHelper = $reflectionHelper;
    }

    public function getEntityNames(): array
    {
        return $this->getClassConstantsValues(EntityNameInterface::class);
    }

    private function getClassConstantsValues($className)
    {
        return $this->reflectionHelper->getClassConstants($className);
    }
}
