<?php

namespace App\DataProvider\Entity;

use App\Base\DataProvider\DataProvider;
use App\Contract\Entity\ClassNameInterface;
use App\Contract\Entity\NameInterface as EntityNameInterface;

class ModelClassNameProvider extends DataProvider
{
    public function getClassNameByEntityCode(string $entityCode)
    {
        return $this->getValueByKey($entityCode);
    }

    protected function getMap(): array
    {
        return [
            EntityNameInterface::PRODUCT => ClassNameInterface::PRODUCT,
            EntityNameInterface::ROLE => ClassNameInterface::ROLE,
        ];
    }
}
