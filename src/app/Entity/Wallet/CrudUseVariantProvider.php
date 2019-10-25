<?php

namespace App\Entity\Wallet;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Кошелек';
    }

    public function getListName(): string
    {
        return 'Кошельки';
    }

    public function getGenitiveName(): string
    {
        return 'кошелька';
    }
}
