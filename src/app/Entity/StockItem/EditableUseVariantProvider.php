<?php

namespace App\Entity\StockItem;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
