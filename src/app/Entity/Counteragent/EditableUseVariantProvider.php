<?php

namespace App\Entity\Counteragent;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Контрагент';
    }

    public function getListName(): string
    {
        return 'Контрагенты';
    }

    public function getGenitiveName(): string
    {
        return 'контрагента';
    }
}
