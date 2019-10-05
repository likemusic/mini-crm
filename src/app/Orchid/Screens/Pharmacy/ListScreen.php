<?php

namespace App\Orchid\Screens\Pharmacy;

use App\Entity\Pharmacy\NotEditableUseVariantProvider;
use App\Orchid\Layouts\Pharmacy\PharmacyListLayout;
use App\Orchid\Screens\Base\ListScreen\BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(NotEditableUseVariantProvider $useVariant, ?Request $request = null)
    {
        parent::__construct($useVariant, $request);
    }

    protected function getDataKey(): string
    {
        return PharmacyListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return PharmacyListLayout::class;
    }

    protected function getData()
    {
        return [];
    }
}
