<?php

namespace App\Contract\Entity\Currency\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const NAME = 'Название';
    const CODE = 'Код';
    const SORT_ORDER = 'Приоритет';
}
