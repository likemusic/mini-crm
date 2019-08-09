<?php

namespace App\Entity\Warehouse;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
