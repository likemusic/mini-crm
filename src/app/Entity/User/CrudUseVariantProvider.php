<?php

namespace App\Entity\User;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;

class CrudUseVariantProvider implements CrudUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Пользователь';
    }

    public function getListName(): string
    {
        return 'Пользователи';
    }

    public function getGenitiveName(): string
    {
        return 'пользователя';
    }
}
