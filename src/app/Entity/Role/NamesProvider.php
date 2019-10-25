<?php

namespace App\Entity\Role;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'role';
    }

    public function getListDataKey()
    {
        return 'roles';
    }
}
