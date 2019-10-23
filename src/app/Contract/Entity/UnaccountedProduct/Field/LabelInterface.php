<?php

namespace App\Contract\Entity\UnaccountedProduct\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const NOTE = 'Примечание';
}
