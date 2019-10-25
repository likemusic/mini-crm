<?php

namespace App\Entity\ProductCategory;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
