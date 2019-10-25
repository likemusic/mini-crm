<?php

namespace App\Entity\UnaccountedProduct;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
