<?php

namespace App\Entity\Currency;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Валюта';
    }

    public function getListName(): string
    {
        return 'Валюты';
    }

    public function getGenitiveName(): string
    {
        return 'валюты';
    }
}
