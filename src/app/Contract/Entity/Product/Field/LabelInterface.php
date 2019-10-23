<?php

namespace App\Contract\Entity\Product\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;
use App\Contract\Entity\Base\Field\Label\NameInterface;

interface LabelInterface extends EntityInterface, NameInterface
{
    const CATEGORY = 'Категория';
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';
}
