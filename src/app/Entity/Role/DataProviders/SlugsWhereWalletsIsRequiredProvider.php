<?php

namespace App\Entity\Role\DataProviders;

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;

class SlugsWhereWalletsIsRequiredProvider
{
    public function getSlugsWhereWalletsIsRequired(): array
    {
        return [
            RoleSlugInterface::COURIER,
        ];
    }
}
