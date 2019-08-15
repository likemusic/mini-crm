<?php

namespace App\Entity\Order;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
