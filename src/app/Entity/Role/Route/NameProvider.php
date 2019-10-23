<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;

class NameProvider extends BaseNameProvider
{
    protected function getEntityRouteName(): string
    {
        return 'role';
    }
}
