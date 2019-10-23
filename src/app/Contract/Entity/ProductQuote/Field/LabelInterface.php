<?php

namespace App\Contract\Entity\ProductQuote\Field;

use App\Contract\Entity\Base\Field\TimestampsInterface;

interface LabelInterface extends TimestampsInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const NOTE = 'Примечание';
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';

    const PRODUCT_ID = 'Id товара';
    const PRODUCT = 'Товар';
}
