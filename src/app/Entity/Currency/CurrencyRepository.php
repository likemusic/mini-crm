<?php

namespace App\Entity\Currency;

use App\Entity\Currency\Currency;
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

    public function getAvailableCurrencies()
    {
        return $this->currencyModel->all();
    }
}
