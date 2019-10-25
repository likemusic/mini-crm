<?php

namespace App\Entity\DiscountedProduct;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Уцененный товар';
    }

    public function getListName(): string
    {
        return 'Уцененные товары';
    }

    public function getGenitiveName(): string
    {
        return 'уцененного товара';
    }
}
