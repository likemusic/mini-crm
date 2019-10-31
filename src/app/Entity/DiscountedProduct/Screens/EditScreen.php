<?php

namespace App\Entity\DiscountedProduct\Screens;

use App\Contract\Entity\DiscountedProduct\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\DiscountedProduct\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\DiscountedProduct\Route\NameProvider as RouteNameProvider;
use App\Entity\DiscountedProduct\CrudUseVariantProvider as UseVariant;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Entity\DiscountedProduct\InfoMessageProvider as InfoMessageProvider;
use App\Entity\DiscountedProduct\DiscountedProduct;
use App\Entity\Product\Product;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
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

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(DiscountedProduct $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(DiscountedProduct $model): array
    {
        return $this::onQuery($model);
    }
}
