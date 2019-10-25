<?php

namespace App\Entity\Product;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Товар';
    }

    public function getListName(): string
    {
        return 'Товары';
    }

    public function getGenitiveName(): string
    {
        return 'товара';
    }
}
