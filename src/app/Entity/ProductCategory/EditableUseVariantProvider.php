<?php

namespace App\Entity\ProductCategory;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Категория';
    }

    public function getListName(): string
    {
        return 'Категории';
    }

    public function getGenitiveName(): string
    {
        return 'категории';
    }
}
