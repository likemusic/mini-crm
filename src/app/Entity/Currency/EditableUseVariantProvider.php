<?php

namespace App\Entity\Currency;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
