<?php

namespace App\Contract\Entity\Permission\Field;

use App\Contract\Entity\Base\Field\Name\IdInterface;
use App\Contract\Entity\Base\Field\Name\NameInterface as FieldNameNameInterface;

interface NameInterface extends IdInterface, FieldNameNameInterface
{
    const ID = 'id';
    const SLUG = 'slug';
    const PERMISSIONS = 'permissions';
}
