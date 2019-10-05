<?php

namespace App\Entity\Pharmacy;

use App\Contract\Entity\Base\NotEditableUseVariantProviderInterface;

class NotEditableUseVariantProvider implements NotEditableUseVariantProviderInterface
{
    public function getListName(): string
    {
        return 'Аптека';
    }
}
