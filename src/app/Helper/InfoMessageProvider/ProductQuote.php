<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\ProductQuote\CrudUseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class ProductQuote extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
