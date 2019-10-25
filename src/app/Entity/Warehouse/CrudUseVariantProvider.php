<?php

namespace App\Entity\Warehouse;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Склад';
    }

    public function getListName(): string
    {
        return 'Склады';
    }

    public function getGenitiveName(): string
    {
        return 'склада';
    }
}
