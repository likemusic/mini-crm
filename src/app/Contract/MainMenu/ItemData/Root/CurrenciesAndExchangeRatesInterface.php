<?php

namespace App\Contract\MainMenu\ItemData\Root;

use App\Contract\Common\IconNameInterface;
use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;

interface CurrenciesAndExchangeRatesInterface
{
    const PERMISSION = MainMenuPermissionNameInterface::CURRENCIES_AND_EXCHANGE_RATES;
    const ICON = IconNameInterface::MONEY;
    const LABEL = 'Валюты и курсы обмена';
    const SLUG = 'currencies-and-exchange-rates';
}
