<?php

namespace App\Helper\Entity;

use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\ClassNameInterface;

class ModelClassNameProvider
{
    private $entityToModelClassName = [
        EntityNameInterface::PRODUCT => ClassNameInterface::PRODUCT,
        EntityNameInterface::ROLE => ClassNameInterface::ROLE,
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
