<?php

namespace App\Orchid\Screens\ProductQuote;

use App\Contract\Entity\ProductQuote\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\EditableUseVariantProvider as UseVariant;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\ProductQuote as InfoMessageProvider;
use App\Model\ProductQuote;
use App\Model\Product;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        UseVariant $useVariant,
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
                Relation::make($this->getDataPath(FieldNameInterface::PRODUCT_ID))
                    ->title(FieldLabelInterface::PRODUCT)
                    ->required()
//                    ->placeholder('Уцененный товар')
//                    ->help('Выберите товар для уцененки.')
                    ->fromModel(
                        Product::class,
                        ProductFieldNameInterface::NAME,
                        ProductFieldNameInterface::ID
                    ),

                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::APPROXIMATE_PRICE))
                    ->title(FieldLabelInterface::APPROXIMATE_PRICE),

                Input::make($this->getDataPath(FieldNameInterface::SELLING_PRICE))
                    ->title(FieldLabelInterface::SELLING_PRICE),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(ProductQuote $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(ProductQuote $model): array
    {
        return $this::onQuery($model);
    }
}
