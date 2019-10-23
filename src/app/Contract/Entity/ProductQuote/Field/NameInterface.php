<?php

namespace App\Contract\Entity\ProductQuote\Field;

use App\Contract\Entity\Base\Field\Name\NamedEntityInterface;

interface NameInterface extends NamedEntityInterface
{
    const SELLING_PRICE = 'selling_price';
    const APPROXIMATE_PRICE = 'approximate_price';
    const CATEGORY_ID = 'category_id';

    const PRODUCT_ID = 'product_id';
}
