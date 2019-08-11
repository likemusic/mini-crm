<?php

namespace App\Entity\UnaccountedProduct;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Неучтенный товар';
    }

    public function getListName(): string
    {
        return 'Неучтенные товары';
    }

    public function getGenitiveName(): string
    {
        return 'неучтенного товара';
    }
}
