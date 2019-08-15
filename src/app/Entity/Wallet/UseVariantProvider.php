<?php

namespace App\Entity\Wallet;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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
