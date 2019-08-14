<?php

namespace App\Orchid\Screens\OrderItem;

use App\Contract\Entity\OrderItem\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as ProductQuoteFieldNameInterface;
use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\UseVariantProvider as UseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\OrderItem as InfoMessageProvider;
use App\Model\OrderItem;
use App\Model\ProductQuote;
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
                Relation::make($this->getDataPath(FieldNameInterface::PRODUCT_QUOTE_ID))
                    ->title(FieldLabelInterface::PRODUCT_QUOTE)
                    ->required()
//                    ->placeholder('Уцененный товар')
//                    ->help('Выберите товар для уцененки.')
                    ->fromModel(
                        ProductQuote::class,
                        ProductQuoteFieldNameInterface::ID,
                        ProductQuoteFieldNameInterface::ID
                    ),

                Input::make($this->getDataPath(FieldNameInterface::SELLING_PRICE))
                    ->title(FieldLabelInterface::SELLING_PRICE),

                Input::make($this->getDataPath(FieldNameInterface::COUNT))
                    ->title(FieldLabelInterface::COUNT),

                Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                    ->title(FieldLabelInterface::AMOUNT),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(OrderItem $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(OrderItem $model): array
    {
        return $this::onQuery($model);
    }
}
