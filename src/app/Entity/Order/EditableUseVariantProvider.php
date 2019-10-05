<?php

namespace App\Entity\Order;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Заказ';
    }

    public function getListName(): string
    {
        return 'Заказы';
    }

    public function getGenitiveName(): string
    {
        return 'заказа';
    }
}