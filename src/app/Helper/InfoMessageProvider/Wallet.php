<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\Wallet\UseVariantProvider as UseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class Wallet extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, UseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
