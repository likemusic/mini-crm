<?php

namespace App\Entity\User;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey(): string
    {
        return 'user';
    }

    public function getListDataKey(): string
    {
        return 'users';
    }
}
