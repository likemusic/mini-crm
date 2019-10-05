<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\Counteragent\EditableUseVariantProvider as UseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class Counteragent extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, EditableUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
