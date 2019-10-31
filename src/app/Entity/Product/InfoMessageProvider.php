<?php

namespace App\Entity\Product;

use App\Entity\Product\CrudUseVariantProvider;
use App\Entity\Base\BaseInfoMessageProvider;
use App\Common\Page\Element\InfoMessageHelper as InfoMessageHelper;

class InfoMessageProvider extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
