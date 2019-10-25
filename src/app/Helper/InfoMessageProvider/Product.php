<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\Product\CrudUseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class Product extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
