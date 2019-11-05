<?php

namespace App\Entity\ExchangeRate;

use App\Entity\Currency\Currency;
use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;

class ExchangeRateRepository
{
    /** @var ExchangeRate */
    private $model;

    public function __construct(ExchangeRate $model)
    {
        $this->model = $model;
    }

    public function getByCurrencies(Currency $fromCurrency, Currency $toCurrency)
    {
        $fromCurrencyId = $fromCurrency->getKey();
        $toCurrencyId = $toCurrency->getKey();

        return $this->getByCurrenciesIds($fromCurrencyId, $toCurrencyId);
    }

    private function getByCurrenciesIds(int $fromCurrencyId, int $toCurrencyId): ?ExchangeRate
    {
        return $this->model
            ->where(FieldNameInterface::FROM_CURRENCY_ID, $fromCurrencyId)
            ->andWhere(FieldNameInterface::TO_CURRENCY_ID, $toCurrencyId)
            ->get();
    }
}
