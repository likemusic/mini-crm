<?php

namespace App\Repositories;

use App\Model\Currency;
use Illuminate\Support\Facades\DB;
use App\Contract\Entity\Currency\TableInterface;
use App\Contract\Entity\Currency\Field\NameInterface;

class CurrencyRepository
{
    private $currencyModel;

    public function __construct(Currency $currencyModel)
    {
        $this->currencyModel = $currencyModel;
    }

    public function getCurrencyIdByCode(string $currencyCode): int
    {
        return DB::table(TableInterface::NAME)
            ->where(NameInterface::CODE, $currencyCode)
            ->first(NameInterface::ID)
            ->id;
    }
}
