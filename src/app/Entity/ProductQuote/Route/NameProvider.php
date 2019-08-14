<?php

namespace App\Entity\ProductQuote\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.product-quote.list';
    }

    public function getNew(): string
    {
        return 'platform.product-quote.new';
    }

    public function getEdit(): string
    {
        return 'platform.product-quote.edit';
    }
}
