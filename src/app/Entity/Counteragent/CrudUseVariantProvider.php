<?php

namespace App\Entity\Counteragent;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
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
