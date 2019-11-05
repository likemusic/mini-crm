<?php

namespace App\Entity\Currency;

use App\Contract\Entity\Currency\Field\NameInterface;
use App\Contract\Entity\Currency\TableInterface;
use Illuminate\Support\Facades\DB;

class CurrencyRepository
{
    /** @var Currency */
    private $model;

    public function __construct(Currency $currencyModel)
    {
        $this->model = $currencyModel;
    }

    public function getById(int $id): Currency
    {
        return $this->model->get($id);
    }

    public function getCurrencyIdByCode(string $currencyCode): int
    {
        return DB::table(TableInterface::NAME)
            ->where(NameInterface::CODE, $currencyCode)
            ->first(NameInterface::ID)
            ->id;
    }

    public function getAllCurrencies()
    {
        return $this->model->all();
    }
}
