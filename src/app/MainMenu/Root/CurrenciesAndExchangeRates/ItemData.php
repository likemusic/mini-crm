<?php

namespace App\MainMenu\Root\CurrenciesAndExchangeRates;

use App\Contract\MainMenu\ItemData\Root\CurrenciesAndExchangeRatesInterface as ItemDataInterface;
use App\MainMenu\Root\Base\ItemData as BaseItemData;

class ItemData extends BaseItemData
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
