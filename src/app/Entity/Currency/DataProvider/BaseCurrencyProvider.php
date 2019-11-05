<?php

namespace App\Entity\Currency\DataProvider;

use App\Entity\Currency\Currency;
use App\Entity\Settings\SettingsRepository;
use App\Entity\Currency\CurrencyRepository;

class BaseCurrencyProvider
{
    /** @var SettingsRepository  */
    private $settingsRepository;

    /** @var CurrencyRepository */
    private $currencyRepository;

    public function __construct(
        SettingsRepository $settingsRepository,
        CurrencyRepository $currencyRepository
    )
    {
        $this->settingsRepository = $settingsRepository;
        $this->currencyRepository = $currencyRepository;
    }

    public function getBaseCurrency(): Currency
    {
        if (!$baseCurrencyId = $this->getBaseCurrencyId()) {
            return null;
        };

        return $this->getCurrencyById($baseCurrencyId);
    }

    private function getBaseCurrencyId(): int
    {
        return $this->settingsRepository->getBaseCurrencyId();
    }

    private function getCurrencyById(int $currencyId)
    {
        return $this->currencyRepository->getById($currencyId);
    }
}
