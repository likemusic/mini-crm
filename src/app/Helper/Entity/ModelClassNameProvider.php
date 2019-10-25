<?php

namespace App\Helper\Entity;

use App\Contract\EntityInterface;
use App\Contract\Entity\ClassNameInterface;

class ModelClassNameProvider
{
    private $entityToModelClassName = [
        EntityInterface::PRODUCT => ClassNameInterface::PRODUCT
    ];

    public function getClassNameByEntityCode(string $entityCode)
    {
        $map = $this->entityToModelClassName;

        if (!array_key_exists($entityCode, $map)) {
            throw new \Exception('Invalid entity code: '. $entityCode);
        }

        return $map[$entityCode];
    }
}
