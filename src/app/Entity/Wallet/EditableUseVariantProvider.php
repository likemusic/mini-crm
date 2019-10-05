<?php

namespace App\Entity\Wallet;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
