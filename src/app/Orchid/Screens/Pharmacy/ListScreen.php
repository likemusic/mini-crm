<?php

namespace App\Orchid\Screens\Pharmacy;

use App\Entity\Pharmacy\NotEditableUseVariantProvider;
use App\Orchid\Layouts\Pharmacy\PharmacyListLayout;
use App\Orchid\Screens\Base\ListScreen\BaseListScreen;
use Illuminate\Http\Request;
use App\DataProviders\PharmacyDataProvider;

class ListScreen extends BaseListScreen
{
    /**
     * @var PharmacyDataProvider
     */
    private $pharmacyDataProvider;

    public function __construct(
        NotEditableUseVariantProvider $useVariant,
        PharmacyDataProvider $pharmacyDataProvider,
        ?Request $request = null
    ) {
        $this->pharmacyDataProvider = $pharmacyDataProvider;

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
        return \App\Model\Pharmacy::paginate();
        //\App\Model\Pharmacy::all();

//        return $this->pharmacyDataProvider->all();
    }
}
