<?php

namespace App\Contract\Entity\Currency\Field;

interface LabelInterface
{
    const ID = 'Id';
    const NAME = 'Название';
    const CODE = 'Код';
    const SORT_ORDER = 'Приоритет';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
