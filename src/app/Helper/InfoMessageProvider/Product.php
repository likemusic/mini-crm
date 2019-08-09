<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\Product\UseVariant as ProductUseVariant;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class Product extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, ProductUseVariant $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
