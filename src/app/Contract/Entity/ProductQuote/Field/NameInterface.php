<?php

namespace App\Contract\Entity\ProductQuote\Field;

interface NameInterface
{
    const ID = 'id';
    const NAME = 'name';
    const NOTE = 'note';
    const SELLING_PRICE = 'selling_price';
    const APPROXIMATE_PRICE = 'approximate_price';
    const CATEGORY_ID = 'category_id';

    const PRODUCT_ID = 'product_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
