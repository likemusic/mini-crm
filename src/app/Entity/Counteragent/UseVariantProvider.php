<?php

namespace App\Entity\Counteragent;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
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