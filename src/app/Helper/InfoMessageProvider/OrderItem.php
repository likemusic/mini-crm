<?php

namespace App\Helper\InfoMessageProvider;

use App\Entity\OrderItem\CrudUseVariantProvider;
use App\Helper\BaseInfoMessageProvider;
use App\Helper\InfoMessage as InfoMessageHelper;

class OrderItem extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
