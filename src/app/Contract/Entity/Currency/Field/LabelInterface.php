<?php

namespace App\Contract\Entity\Currency\Field;

use App\Contract\Entity\Base\Field\Label\IdInterface;
use App\Contract\Entity\Base\Field\Label\SortOrderInterface;
use App\Contract\Entity\Base\Field\Label\TimestampsInterface;

interface LabelInterface extends IdInterface, SortOrderInterface, TimestampsInterface
{
    const NAME = 'Название';
    const CODE = 'Код';
}
