<?php

namespace App\Orchid\Screens\Warehouse;

use App\Contract\Entity\Product\Field\LabelInterface as ProductFieldLabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as WarehouseRouteNameProvider;
use App\Entity\Warehouse\UseVariantProvider as WarehouseUseVariant;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as ProductInfoMessageProvider;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        WarehouseRouteNameProvider $routeNameProvider,
        WarehouseUseVariant $useVariant,
        ProductInfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        ?Request $request = null
    ) {
        parent::__construct($routeNameProvider, $useVariant, $infoMessageProvider, $breadcrumbsHelper, $request);
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make($this->getDataPath(ProductFieldNameInterface::NAME))
                    ->title(ProductFieldLabelInterface::NAME),

                Input::make($this->getDataPath(ProductFieldNameInterface::APPROXIMATE_PRICE))
                    ->title(ProductFieldLabelInterface::APPROXIMATE_PRICE),

                Input::make($this->getDataPath(ProductFieldNameInterface::SELLING_PRICE))
                    ->title(ProductFieldLabelInterface::SELLING_PRICE),

                TextArea::make($this->getDataPath(ProductFieldNameInterface::NOTE))
                    ->title(ProductFieldLabelInterface::NOTE),
            ])
        ];
    }
}
