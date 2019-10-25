<?php

namespace App\Orchid\Screens\Order;

use App\Contract\Entity\Counteragent\Field\NameInterface as CounteragentFieldNameInterface;
use App\Contract\Entity\Order\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Pharmacy\Field\LabelInterface as PharmacyFieldLabelInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Pharmacy\Field\NameInterface as PharmacyFieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Entity\Order\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Order as InfoMessageProvider;
use App\Model\Counteragent;
use App\Model\Currency;
use App\Model\Order;
use App\Model\Pharmacy;
use App\Model\Product;
use App\Model\User;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use App\Repositories\CurrencyRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Orchid\Platform\Dashboard;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Orchid\Screen\Fields\RelationWithData;


class EditScreen extends BaseEditScreen
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    /**
     * @var Dashboard
     */
    private $dashboard;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        CrudUseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        CurrencyRepository $currencyRepository,
        Dashboard $dashboard,
        ?Request $request = null
    )
    {
        $this->dashboard = $dashboard;

        $dashboard->registerResource('scripts', 'https://cdn.jsdelivr.net/npm/vue@2.6.0');
        $dashboard->registerResource('scripts', '/js/order.js');
        $this->currencyRepository = $currencyRepository;
        parent::__construct($routeNameProvider, $useVariant, $infoMessageProvider, $breadcrumbsHelper, $request);
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        $productDataFieldName = [
            PharmacyFieldNameInterface::SELLING_PRICE,
            PharmacyFieldNameInterface::APPROXIMATE_PRICE,
            PharmacyFieldNameInterface::WAREHOUSES_TOTAL_QUANTITY
        ];

        $rows = [
            Field::group([
                DateTimer::make($this->getDataPath(FieldNameInterface::DATETIME))
                    ->title(FieldLabelInterface::DATETIME)
                    ->enableTime()
                    ->allowInput(),

                Input::make($this->getDataPath(FieldNameInterface::DATE_ORDER_ID))
                    ->title(FieldLabelInterface::DATE_ORDER_ID),
            ]),

//            Relation::make($this->getDataPath(FieldNameInterface::PRODUCT_ID . '1'))
//                ->title(FieldLabelInterface::PRODUCT)
//                ->fromModel(Product::class, ProductFieldNameInterface::NAME),
//                ->empty('Выберите товар'),

            RelationWithData::make($this->getDataPath(FieldNameInterface::PRODUCT_ID))
                ->title(FieldLabelInterface::PRODUCT)
                ->fromModel(Pharmacy::class, PharmacyFieldNameInterface::NAME, null, $productDataFieldName)
//                ->empty('Выберите товар')

        ];

        if (!$this->exists) {
            $rows = array_merge($rows, $this->getProductInfoFieldGroup());
        }

        $rows = array_merge($rows, [
            Field::group([
                Input::make($this->getDataPath(FieldNameInterface::ITEM_PRICE))
                    ->title(FieldLabelInterface::ITEM_PRICE)
                    ->required(),

                Input::make($this->getDataPath(FieldNameInterface::COUNT))
                    ->type('number')
                    ->min(1)
                    ->title(FieldLabelInterface::COUNT)
                    ->required(),

                Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                    ->title(FieldLabelInterface::AMOUNT)
                    ->readonly(),
            ]),


            Input::make($this->getDataPath(FieldNameInterface::IMEIES))
                ->title(FieldLabelInterface::IMEIES)
                ->required(),


            Field::group([

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
                    ->applyScope('courier'),
            ]),

            Field::group(
                $this->getIncomesRows()
            ),

            TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                ->title(FieldLabelInterface::NOTE)
                ->rows(5)
        ]);

//                Input::make($this->getDataPath(FieldNameInterface::PRODUCT_QUOTE_ID))
//                    ->title(FieldLabelInterface::PRODUCT_QUOTE_ID),

        return [
            Layout::rows($rows)
        ];
    }

    private function getProductInfoFieldGroup()
    {
       return [
            Field::group([
                Input::make($this->getDataPath(PharmacyFieldNameInterface::APPROXIMATE_PRICE))
                    ->title(PharmacyFieldLabelInterface::APPROXIMATE_PRICE)
                    ->readonly()
                ,

                Input::make($this->getDataPath(PharmacyFieldNameInterface::SELLING_PRICE))
                    ->title(PharmacyFieldLabelInterface::SELLING_PRICE)
                    ->readonly()
                ,

                Input::make($this->getDataPath(PharmacyFieldNameInterface::WAREHOUSES_TOTAL_QUANTITY))
                    ->title(PharmacyFieldLabelInterface::WAREHOUSES_TOTAL_QUANTITY)
                    ->readonly()
                ,
            ])
        ];
    }

    private function getIncomesRows()
    {
        $currencies = $this->getAvailableCurrencies();

        $incomesRows = [];

        foreach ($currencies as $currency) {
            $incomesRows[] = $this->createIncomeRowByCurrency($currency);
        }

        return $incomesRows;
    }

    private function getAvailableCurrencies(): Collection
    {
        return $this->currencyRepository->getAvailableCurrencies();
    }

    private function createIncomeRowByCurrency(Currency $currency)
    {
        $currencyCode = $currency->code;
        $incomeName = $this->getIncomeKeyByCurrency($currencyCode);
        $incomeLabel = $this->getIncomeLabelByCurrency($currencyCode);

        return Input::make($incomeName)->title($incomeLabel);
    }

    private function getIncomeKeyByCurrency(string $currencyCode)
    {
        return "income_{$currencyCode}";
    }

    private function getIncomeLabelByCurrency(string $currencyCode)
    {
        return "Отдача, {$currencyCode}";
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
