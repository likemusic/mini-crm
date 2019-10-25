<?php

namespace App\Entity\ProductQuote;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
