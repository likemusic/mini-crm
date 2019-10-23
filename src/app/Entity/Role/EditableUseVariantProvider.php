<?php

namespace App\Entity\Role;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;

class EditableUseVariantProvider implements EditableUseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Роль пользователя';
    }

    public function getListName(): string
    {
        return 'Роли пользователей';
    }

    public function getGenitiveName(): string
    {
        return 'роли пользователей';
    }
}
