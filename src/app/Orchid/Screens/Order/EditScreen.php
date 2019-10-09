<?php

namespace App\Orchid\Screens\Order;

use App\Contract\Entity\Order\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\OrderItem\Field\NameInterface as OrderItemFieldNameInterface;
use App\Contract\Entity\Counteragent\Field\NameInterface as CounteragentItemFieldNameInterface;
use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\Order\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Order as InfoMessageProvider;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Counteragent;
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
        EditableUseVariantProvider $useVariant,
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
                Input::make($this->getDataPath(FieldNameInterface::DATETIME))
                    ->title(FieldLabelInterface::DATETIME),

                Input::make($this->getDataPath(FieldNameInterface::DATE_ORDER_ID))
                    ->title(FieldLabelInterface::DATE_ORDER_ID),

                Input::make($this->getDataPath(FieldNameInterface::PRODUCT_QUOTE_ID))
                    ->title(FieldLabelInterface::PRODUCT_QUOTE_ID),

                Input::make($this->getDataPath(FieldNameInterface::IMEIES))
                    ->title(FieldLabelInterface::IMEIES),

                Input::make($this->getDataPath(FieldNameInterface::COUNT))
                    ->title(FieldLabelInterface::COUNT),

                Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                    ->title(FieldLabelInterface::AMOUNT),

                Input::make($this->getDataPath(FieldNameInterface::PROVIDER_ID))
                    ->title(FieldLabelInterface::PROVIDER_ID),

                Input::make($this->getDataPath(FieldNameInterface::BUYER_ID))
                    ->title(FieldLabelInterface::BUYER_ID),

                Input::make($this->getDataPath(FieldNameInterface::COURIER_ID))
                    ->title(FieldLabelInterface::COURIER_ID),

                Input::make($this->getDataPath(FieldNameInterface::INCOMES))
                    ->title(FieldLabelInterface::INCOMES),

                Input::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),

//                Relation::make($this->getDataPath(FieldNameInterface::COUNTERAGENT_ID))
//                    ->title(FieldLabelInterface::COUNTERAGENT_ID)
//                    ->required()
//                    ->fromModel(
//                        Counteragent::class,
//                        CounteragentItemFieldNameInterface::NAME,
//                        CounteragentItemFieldNameInterface::ID
//                    ),
            ])
        ];
    }

    public function createOrUpdate(Order $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Order $model): array
    {
        return $this::onQuery($model);
    }
}
