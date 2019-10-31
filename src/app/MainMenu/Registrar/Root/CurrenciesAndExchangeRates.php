<?php

namespace App\MainMenu\Registrar\Root;

use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\ItemData\Root\CurrenciesAndExchangeRates as MenuItemData;
use App\MainMenu\Registrar\Child\Currency as CurrencyMenuRegistrar;
use App\MainMenu\Registrar\Child\ExchangeRate as ExchangeRateMenuRegistrar;

class CurrenciesAndExchangeRates extends Base
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
