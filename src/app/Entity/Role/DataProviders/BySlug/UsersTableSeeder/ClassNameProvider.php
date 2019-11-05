<?php

namespace App\Entity\Role\DataProviders\BySlug\UsersTableSeeder;

use App\Base\DataProvider\ClassNameProvider as BaseClassNameProvider;
use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\Contract\Entity\User\TableSeederClassNameInterface;

class ClassNameProvider extends BaseClassNameProvider
{
    protected function getMap(): array
    {
        return [
            RoleSlugInterface::ADMIN => TableSeederClassNameInterface::ADMIN,
            RoleSlugInterface::DIRECTOR => TableSeederClassNameInterface::DIRECTOR,
            RoleSlugInterface::COURIER => TableSeederClassNameInterface::COURIER,
            RoleSlugInterface::OPERATOR => TableSeederClassNameInterface::OPERATOR,
            RoleSlugInterface::WAREHOUSEMAN => TableSeederClassNameInterface::WAREHOUSEMAN,
        ];
    }
}
