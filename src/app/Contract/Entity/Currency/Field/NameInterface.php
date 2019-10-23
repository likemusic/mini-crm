<?php

namespace App\Contract\Entity\Currency\Field;

use App\Contract\Entity\Base\Field\Name\IdInterface;
use App\Contract\Entity\Base\Field\Name\NameInterface as FieldNameNameInterface;
use App\Contract\Entity\Base\Field\Name\SortOrderInterface;
use App\Contract\Entity\Base\Field\Name\TimestampsInterface;

interface NameInterface extends IdInterface, FieldNameNameInterface, SortOrderInterface, TimestampsInterface
{
    const CODE = 'code';
}
