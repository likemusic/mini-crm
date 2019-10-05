<?php

namespace App\Entity\ProductQuote;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
