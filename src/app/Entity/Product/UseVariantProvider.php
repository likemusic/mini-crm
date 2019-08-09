<?php

namespace App\Entity\Product;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
