<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\UnaccountedProduct\UseVariantProvider as UseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class UnaccountedProduct extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, UseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
