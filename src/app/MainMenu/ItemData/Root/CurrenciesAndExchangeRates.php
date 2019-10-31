<?php

namespace App\MainMenu\ItemData\Root;

use App\Contract\MainMenu\ItemData\Root\CurrenciesAndExchangeRatesInterface as ItemDataInterface;

class CurrenciesAndExchangeRates extends Base
{
    public function __construct()
    {
        parent::__construct(
            ItemDataInterface::PERMISSION,
            ItemDataInterface::ICON,
            ItemDataInterface::LABEL,
            ItemDataInterface::SLUG
        );
    }
}
