<?php

namespace App\Entity\User\TableSeeder;

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;

class Operator extends Base
{
    protected function getRoleSlug(): string
    {
        return RoleSlugInterface::OPERATOR;
    }
}
