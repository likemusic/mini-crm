<?php

namespace App\Menu\Main\Root\CurrenciesAndExchangeRates;

use App\Contract\MainMenu\Root\PermissionNameInterface as MainMenuPermissionNameInterface;
use App\Menu\Main\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\Menu\Main\Root\Base\Registrar as BaseRegistrar;
use App\Menu\Main\Root\CurrenciesAndExchangeRates\ItemData as MenuItemData;
use App\Entity\Currency\MainMenu\Registrar as CurrencyMenuRegistrar;
use App\Entity\ExchangeRate\MainMenu\Registrar as ExchangeRateMenuRegistrar;

class Registrar extends BaseRegistrar
{
    /**
     * @var CurrencyMenuRegistrar
     */
    private $currencyMenuRegistrar;

    /** @var ExchangeRateMenuRegistrar */
    private $exchangeRateMenuRegistrar;

    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        MenuItemData $itemData,
        CurrencyMenuRegistrar $currencyMenuRegistrar
//        ExchangeRateMenuRegistrar $exchangeRateMenuRegistrar
    )
    {
        $this->currencyMenuRegistrar = $currencyMenuRegistrar;
//        $this->exchangeRateMenuRegistrar = $exchangeRateMenuRegistrar;

        parent::__construct($mainMenuPermissionToCrmPermissionsConverter, $itemData);
    }

    protected function getChildMenuRegistrars(): array
    {
        return [
            $this->currencyMenuRegistrar,
//            $this->exchangeRateMenuRegistrar,
        ];
    }

    protected function getMenuPermission(): string
    {
        return MainMenuPermissionNameInterface::CURRENCIES_AND_EXCHANGE_RATES;
    }
}
