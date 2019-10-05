<?php

namespace App\Entity\DiscountedProduct;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
