<?php

namespace App\EntityMeta\DataProvider\ByName\Model;

use App\Base\DataProvider\DataProvider;
use App\Contract\Entity\ClassNameInterface;
use App\Contract\Entity\NameInterface as EntityNameInterface;

class ClassNameProvider extends DataProvider
{
    public function getClassNameByEntityCode(string $entityCode)
    {
        return $this->getValueByKey($entityCode);
    }

    public function getTypedValueByKey($entityCode): string
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
