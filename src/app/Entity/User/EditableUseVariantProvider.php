<?php

namespace App\Entity\User;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
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
