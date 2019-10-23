<?php

namespace App\Contract\Entity\Role\Field;

use App\Contract\Entity\Base\Field\Label\IdInterface;
use App\Contract\Entity\Base\Field\Label\NameInterface;

interface LabelInterface extends IdInterface, NameInterface
{
    const SLUG = 'slug';
    const PERMISSIONS = 'Разрешения';
}
