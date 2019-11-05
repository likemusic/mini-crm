<?php

namespace App\Entity\Currency\DataProvider;

use App\Entity\Currency\Currency;
use App\Entity\ExchangeRate\DataProvider\IsExchangeRateDefinedResolver;

class IsCurrencyAvailableResolver
{
    /** @var BaseCurrencyProvider */
    private $baseCurrencyProvider;

    /** @var IsExchangeRateDefinedResolver */
    private $isExchangeRateDefinedResolver;

    public function __construct(
        BaseCurrencyProvider $baseCurrencyProvider,
        IsExchangeRateDefinedResolver $isExchangeRateDefinedResolver
    )
    {
        $this->baseCurrencyProvider = $baseCurrencyProvider;
        $this->isExchangeRateDefinedResolver = $isExchangeRateDefinedResolver;
    }

    public function isCurrencyAvailable(Currency $currency): bool
    {
        $baseCurrency = $this->getBaseCurrency();

        if (!$baseCurrency) {
            return false;
        }

        if ($currency === $baseCurrency) {
            return true;
        }

        if (!$this->isExchangeRateDefined($currency, $baseCurrency)) {
            return false;
        }

        return true;
    }

    private function getBaseCurrency(): ?Currency
    {
        return $this->baseCurrencyProvider->getBaseCurrency();
    }

    private function isExchangeRateDefined(Currency $fromCurrency, Currency $toCurrency): bool
    {
        return $this->isExchangeRateDefinedResolver->isExchangeRateDefined($fromCurrency, $toCurrency);
    }
}
