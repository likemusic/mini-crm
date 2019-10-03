<?php

namespace App\Entity\ProductCategory;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
