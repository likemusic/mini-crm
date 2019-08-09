<?php

namespace App\Entity\Product;

use App\Contract\Entity\Base\UseVariantInterface;

class UseVariant implements UseVariantInterface
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
