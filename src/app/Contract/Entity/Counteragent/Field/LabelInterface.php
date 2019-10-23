<?php

namespace App\Contract\Entity\Counteragent\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';

    const NAME = 'Имя';

    const NOTE = 'Примечание';
}
