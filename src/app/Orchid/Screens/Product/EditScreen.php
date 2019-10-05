<?php

namespace App\Orchid\Screens\Product;

use App\Contract\Entity\Product\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as ProductCategoryFieldNameInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\UseVariantProvider as UseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\Product;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Model\ProductCategory;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        UseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
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
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Select::make($this->getDataPath(FieldNameInterface::CATEGORY_ID))
                    ->fromModel(ProductCategory::class, ProductCategoryFieldNameInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::APPROXIMATE_PRICE))
                    ->title(FieldLabelInterface::APPROXIMATE_PRICE),

                Input::make($this->getDataPath(FieldNameInterface::SELLING_PRICE))
                    ->title(FieldLabelInterface::SELLING_PRICE),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(Product $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Product $model): array
    {
        return $this::onQuery($model);
    }
}
