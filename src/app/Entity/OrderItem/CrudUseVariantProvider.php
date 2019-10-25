<?php

namespace App\Entity\OrderItem;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
