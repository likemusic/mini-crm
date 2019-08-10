<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\Warehouse\UseVariantProvider as WarehouseUseVariant;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class Warehouse extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, WarehouseUseVariant $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
