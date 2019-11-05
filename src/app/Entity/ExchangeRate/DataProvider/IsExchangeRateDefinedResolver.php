<?php

namespace App\Entity\ExchangeRate\DataProvider;

use App\Entity\Currency\Currency;
use App\Entity\ExchangeRate\ExchangeRate;
use App\Entity\ExchangeRate\ExchangeRateRepository;

class IsExchangeRateDefinedResolver
{
    private $exchangeRateRepository;

    public function __construct(ExchangeRateRepository $exchangeRateRepository)
    {
        $this->exchangeRateRepository = $exchangeRateRepository;
    }

    public function isExchangeRateDefined(Currency $fromCurrency, Currency $toCurrency): bool
    {
        if (!$exchangeRate = $this->getExchangeRateByCurrencies($fromCurrency, $toCurrency)) {
            return false;
        };

        $rate = $exchangeRate->rate;

        return $rate > 0;
    }

    private function getExchangeRateByCurrencies(Currency $fromCurrency, Currency $toCurrency): ?ExchangeRate
    {
        return $this->exchangeRateRepository->getByCurrencies($fromCurrency, $toCurrency);
    }
}
