<?php

namespace App\Entity\OrderItem;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Строка заказа';
    }

    public function getListName(): string
    {
        return 'Строки заказов';
    }

    public function getGenitiveName(): string
    {
        return 'строки заказа';
    }
}
