<?php

namespace App\Contract\Entity\ProductQuote\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;
use App\Contract\Entity\Base\Field\Label\NameInterface;

interface LabelInterface extends EntityInterface, NameInterface
{
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';

    const PRODUCT_ID = 'Id товара';
    const PRODUCT = 'Товар';
}
