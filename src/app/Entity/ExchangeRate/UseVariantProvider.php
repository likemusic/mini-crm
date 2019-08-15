<?php

namespace App\Entity\ExchangeRate;

use App\Contract\Entity\Base\UseVariantProviderInterface;

class UseVariantProvider implements UseVariantProviderInterface
{
    public function getItemName(): string
    {
        return 'Курс обмена валют';
    }

    public function getListName(): string
    {
        return 'Курсы обмена валют';
    }

    public function getGenitiveName(): string
    {
        return 'курса обмена валют';
    }
}