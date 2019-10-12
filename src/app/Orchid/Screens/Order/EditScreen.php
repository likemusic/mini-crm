<?php

namespace App\Orchid\Screens\Order;

use App\Contract\Entity\Order\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Contract\Entity\OrderItem\Field\NameInterface as OrderItemFieldNameInterface;
use App\Contract\Entity\Counteragent\Field\NameInterface as CounteragentFieldNameInterface;
use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\Order\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Order as InfoMessageProvider;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Counteragent;
use App\Model\Product;
use App\Model\User;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
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
                DateTimer::make($this->getDataPath(FieldNameInterface::DATETIME))
                    ->title(FieldLabelInterface::DATETIME)
                    ->enableTime()
                    ->allowInput(),

                Input::make($this->getDataPath(FieldNameInterface::DATE_ORDER_ID))
                    ->title(FieldLabelInterface::DATE_ORDER_ID),

                Relation::make($this->getDataPath(FieldNameInterface::PRODUCT_ID))
                    ->title(FieldLabelInterface::PRODUCT)
                    ->fromModel(Product::class, ProductFieldNameInterface::NAME)
//                    ->empty('Выберите товар')
                    ->required(),

                Input::make($this->getDataPath(FieldNameInterface::COUNT))
                    ->title(FieldLabelInterface::COUNT)
                    ->required(),

                Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                    ->title(FieldLabelInterface::AMOUNT),

//                Input::make($this->getDataPath(FieldNameInterface::PRODUCT_QUOTE_ID))
//                    ->title(FieldLabelInterface::PRODUCT_QUOTE_ID),

                Input::make($this->getDataPath(FieldNameInterface::IMEIES))
                    ->title(FieldLabelInterface::IMEIES)
                    ->required(),


                Relation::make($this->getDataPath(FieldNameInterface::PROVIDER_ID))
                    ->title(FieldLabelInterface::PROVIDER)
                    ->fromModel(Counteragent::class, CounteragentFieldNameInterface::NAME),

                Relation::make($this->getDataPath(FieldNameInterface::BUYER_ID))
                    ->title(FieldLabelInterface::BUYER)
                    ->fromModel(Counteragent::class, CounteragentFieldNameInterface::NAME)
                    ->required(),

                Relation::make($this->getDataPath(FieldNameInterface::COURIER_ID))
                    ->title(FieldLabelInterface::COURIER)
                    ->fromModel(User::class, UserFieldNameInterface::NAME)
                    ->required()
                    ->applyScope('courier')
                ,

                Input::make($this->getDataPath(FieldNameInterface::INCOMES))
                    ->title(FieldLabelInterface::INCOMES),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
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
