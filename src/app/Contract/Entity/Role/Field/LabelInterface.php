<?php

namespace App\Contract\Entity\Role\Field;

use App\Contract\Entity\Base\Field\Label\IdInterface;
use App\Contract\Entity\Base\Field\Label\NameInterface;
use App\Contract\Entity\Base\Field\Label\CreatedAtInterface;

interface LabelInterface extends IdInterface, NameInterface, CreatedAtInterface
{
    const SLUG = 'slug';
    const PERMISSIONS = 'Разрешения';
}
