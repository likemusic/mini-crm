<?php

namespace App\Contract\Entity\DiscountedProduct\Field;

use App\Contract\Entity\Base\Field\Label\EntityInterface;

interface LabelInterface extends EntityInterface
{
    const PRODUCT_ID = 'Id Товара';
    const PRODUCT = 'Товар';
}
