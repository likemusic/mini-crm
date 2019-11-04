<?php

namespace App\Entity\User\TableSeeder;

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;

class Admin extends Base
{
    protected function getRoleSlug(): string
    {
        return RoleSlugInterface::ADMIN;
    }
}
