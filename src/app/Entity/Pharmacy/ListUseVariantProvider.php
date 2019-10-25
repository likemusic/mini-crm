<?php

namespace App\Entity\Pharmacy;

use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as  ListUseVariantProviderInterface;

class ListUseVariantProvider implements ListUseVariantProviderInterface
{
    public function getListName(): string
    {
        return 'Аптека';
    }
}
