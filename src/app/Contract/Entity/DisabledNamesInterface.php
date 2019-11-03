<?php

namespace App\Contract\Entity;

use App\Contract\Entity\NameInterface as EntityNameInterface;

interface DisabledNamesInterface
{
    const DISABLED_NAMES = [
        EntityNameInterface::COUNTERAGENT,
        EntityNameInterface::COUNTERAGENT,
        EntityNameInterface::EXCHANGE_RATE,
        EntityNameInterface::MONEY_CHANGE,
        EntityNameInterface::MONEY_TRANSFER,
        EntityNameInterface::ORDER,
        EntityNameInterface::ORDER_ITEM,
        EntityNameInterface::DISCOUNTED_PRODUCT,
        EntityNameInterface::PHARMACY,
        EntityNameInterface::WAREHOUSE,
        EntityNameInterface::WALLET,
    ];
}
