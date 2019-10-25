<?php

namespace App\Entity\User;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'user';
    }

    public function getListDataKey()
    {
        return 'users';
    }
}
