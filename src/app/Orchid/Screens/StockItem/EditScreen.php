<?php

namespace App\Orchid\Screens\StockItem;

use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\StockItem\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use App\Entity\StockItem\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\Product;
use App\Model\StockItem;
use App\Model\Warehouse;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        CrudUseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        ?Request $request = null
    )
    {
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
                Select::make($this->getDataPath(FieldNameInterface::PRODUCT_ID))
                    ->fromModel(Product::class, ProductFieldNameInterface::NAME),

                Select::make($this->getDataPath(FieldNameInterface::WAREHOUSE_ID))
                    ->fromModel(Warehouse::class, WarehouseFieldNameInterface::NAME),

                TextArea::make($this->getDataPath(FieldNameInterface::QUANTITY))
                    ->title(FieldLabelInterface::QUANTITY),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(StockItem $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(StockItem $model): array
    {
        return $this::onQuery($model);
    }
}
