<?php

namespace App\Entity\Settings;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Настройка';
    }

    public function getListName(): string
    {
        return 'Настройки';
    }

    public function getGenitiveName(): string
    {
        return 'настройки';
    }
}
