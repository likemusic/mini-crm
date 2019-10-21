<?php

namespace App\Orchid\Screens\Pharmacy;

use App\DataProviders\PharmacyDataProvider;
use App\Entity\Pharmacy\NotEditableUseVariantProvider;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Model\Pharmacy;
use App\Orchid\Layouts\Pharmacy\PharmacyListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBasedListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    /**
     * @var PharmacyDataProvider
     */
    private $pharmacyDataProvider;

    public function __construct(
        Pharmacy $model,
        NotEditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        PharmacyDataProvider $pharmacyDataProvider,
        ?Request $request = null
    ) {
        $this->pharmacyDataProvider = $pharmacyDataProvider;
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function canAdd()
    {
        return false;
    }

    protected function getDataKey(): string
    {
        return PharmacyListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return PharmacyListLayout::class;
    }

//    protected function getData()
//    {
//        return \App\Model\Pharmacy::paginate();
//        //\App\Model\Pharmacy::all();
//
////        return $this->pharmacyDataProvider->all();
//    }
}