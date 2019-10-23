<?php

namespace App\Contract\Entity\Product\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const CATEGORY = 'Категория';
    const NOTE = 'Примечание';
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';
}
