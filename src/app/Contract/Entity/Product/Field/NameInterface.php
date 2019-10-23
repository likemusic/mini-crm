<?php

namespace App\Contract\Entity\Product\Field;

use App\Contract\Entity\Base\Field\Name\NamedEntityInterface;

interface NameInterface extends NamedEntityInterface
{
    const CATEGORY = 'category';
    const CATEGORY_ID = 'category_id';
    const SELLING_PRICE = 'selling_price';
    const APPROXIMATE_PRICE = 'approximate_price';
}
