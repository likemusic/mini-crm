<?php

namespace App\Contract\Entity\Role\Field;

use App\Contract\Entity\Base\Field\Name\IdInterface;
use App\Contract\Entity\Base\Field\Name\NameInterface as FieldNameNameInterface;

interface NameInterface extends IdInterface, FieldNameNameInterface
{
    const SLUG = 'slug';
    const PERMISSIONS = 'permissions';
}
