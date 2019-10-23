<?php

namespace App\Contract\Entity\Warehouse\Field;

use App\Contract\Entity\Base\Field\Name\NamedEntityInterface;

interface NameInterface extends NamedEntityInterface
{
    const CODE = 'code';
    const SORT_ORDER = 'sort_order';
}
