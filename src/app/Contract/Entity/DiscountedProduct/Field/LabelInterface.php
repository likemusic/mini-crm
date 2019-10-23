<?php

namespace App\Contract\Entity\DiscountedProduct\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const PRODUCT_ID = 'Id Товара';

    const PRODUCT = 'Товар';
    const NOTE = 'Примечание';
}
