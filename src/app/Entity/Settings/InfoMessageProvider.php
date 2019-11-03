<?php

namespace App\Entity\Settings;

use App\Common\Page\Element\InfoMessageHelper as InfoMessageHelper;
use App\Entity\Base\BaseInfoMessageProvider;

class InfoMessageProvider extends BaseInfoMessageProvider
{
    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProvider $useVariant)
    {
        parent::__construct($infoMessageHelper, $useVariant);
    }
}
