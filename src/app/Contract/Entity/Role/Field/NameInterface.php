<?php

namespace App\Contract\Entity\Role\Field;

use App\Contract\Entity\Base\Field\Name\IdInterface;
use App\Contract\Entity\Base\Field\Name\NameInterface as FieldNameNameInterface;
use \App\Contract\Entity\Base\Field\Name\CreatedAtInterface;

interface NameInterface extends IdInterface, FieldNameNameInterface, CreatedAtInterface
{
    const SLUG = 'slug';
    const PERMISSIONS = 'permissions';
}
