<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\ExchangeRate\EditableUseVariantProvider as UseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class ExchangeRate extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, EditableUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
