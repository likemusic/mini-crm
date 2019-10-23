<?php

namespace App\Contract\Entity\Warehouse\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;
use App\Contract\Entity\Base\Field\Label\SortOrderInterface;

interface LabelInterface extends EntityInterface, SortOrderInterface
{
    const NAME = 'Название';
    const CODE = 'Код';
}
