<?php

namespace App\Contract\Entity\Product\Field;

interface LabelInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const NOTE = 'Примечание';
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
