<?php

namespace App\Entity\Pharmacy\Screens;

use App\Entity\Pharmacy\PharmacyDataProvider;
use App\Entity\Pharmacy\ListUseVariantProvider;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Entity\Pharmacy\Pharmacy;
use App\Entity\Pharmacy\Layouts\PharmacyListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    /**
     * @var PharmacyDataProvider
     */
    private $pharmacyDataProvider;

    public function __construct(
        Pharmacy $model,
        ListUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        PharmacyDataProvider $pharmacyDataProvider,
        ?Request $request = null
    ) {
        $this->pharmacyDataProvider = $pharmacyDataProvider;
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function canCreate()
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
