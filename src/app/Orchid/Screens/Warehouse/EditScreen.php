<?php

namespace App\Orchid\Screens\Warehouse;

use App\Contract\Entity\Warehouse\Field\LabelInterface as WarehouseFieldLabelInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as WarehouseRouteNameProvider;
use App\Entity\Warehouse\UseVariantProvider as WarehouseUseVariant;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Warehouse as WarehouseInfoMessageProvider;
use App\Model\Warehouse;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Contract\Entity\Warehouse\Field\LengthInterface as WarehouseFieldLengthInterface;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        WarehouseRouteNameProvider $routeNameProvider,
        WarehouseUseVariant $useVariant,
        WarehouseInfoMessageProvider $infoMessageProvider,
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
                Input::make($this->getDataPath(WarehouseFieldNameInterface::NAME))
                    ->title(WarehouseFieldLabelInterface::NAME),

                Input::make($this->getDataPath(WarehouseFieldNameInterface::CODE))
                    ->title(WarehouseFieldLabelInterface::CODE)
                    ->size(WarehouseFieldLengthInterface::CODE),

                TextArea::make($this->getDataPath(WarehouseFieldNameInterface::NOTE))
                    ->title(WarehouseFieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(Warehouse $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Warehouse $model): array
    {
        return $this::onQuery($model);
    }
}
