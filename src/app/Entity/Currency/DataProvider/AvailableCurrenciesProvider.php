<?php

namespace App\Entity\Currency\DataProvider;

use App\Entity\Currency\Currency;
use App\Entity\Currency\CurrencyRepository;
use Illuminate\Database\Eloquent\Collection;

class AvailableCurrenciesProvider
{
    /** @var CurrencyRepository */
    private $currencyRepository;

    /** @var IsCurrencyAvailableResolver */
    private $isCurrencyAvailableResolver;

    public function __construct(
        CurrencyRepository $currencyRepository,
        IsCurrencyAvailableResolver $isCurrencyAvailableResolver
    )
    {
        $this->currencyRepository = $currencyRepository;
        $this->isCurrencyAvailableResolver = $isCurrencyAvailableResolver;
    }

    /**
     * @return Currency[]|Collection
     */
    public function getAvailableCurrencies(): Collection
    {
        $allCurrencies = $this->getAllCurrenciesAsArray();

        return array_filter($allCurrencies, [$this, 'isCurrencyAvailable']);
    }

    private function getAllCurrenciesAsArray(): array
    {
        return $this->getAllCurrenciesAsCollection()->toArray();
    }

    private function getAllCurrenciesAsCollection(): Collection
    {
        return $this->currencyRepository->getAllCurrencies();
    }

    private function isCurrencyAvailable(Currency $currency): bool
    {
        return $this->isCurrencyAvailableResolver->isCurrencyAvailable($currency);
    }
}
