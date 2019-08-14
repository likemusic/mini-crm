<?php

namespace App\Entity\DiscountedProduct;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
