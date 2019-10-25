<?php

namespace App\Entity\StockItem;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Запас на складе';
    }

    public function getListName(): string
    {
        return 'Запасы на складах';
    }

    public function getGenitiveName(): string
    {
        return 'запаса на кладе';
    }
}
