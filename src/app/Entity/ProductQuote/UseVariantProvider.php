<?php

namespace App\Entity\ProductQuote;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Снимок товар';
    }

    public function getListName(): string
    {
        return 'Снимки товаров';
    }

    public function getGenitiveName(): string
    {
        return 'снимка товара';
    }
}
