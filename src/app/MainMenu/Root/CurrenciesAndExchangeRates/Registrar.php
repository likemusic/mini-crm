<?php

namespace App\MainMenu\Root\CurrenciesAndExchangeRates;

use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\Root\Base\Registrar as BaseRegistrar;
use App\MainMenu\Root\CurrenciesAndExchangeRates\ItemData as MenuItemData;
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
