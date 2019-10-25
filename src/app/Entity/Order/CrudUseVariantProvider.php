<?php

namespace App\Entity\Order;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
