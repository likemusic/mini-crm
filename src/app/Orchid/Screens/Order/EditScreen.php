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
use App\Model\Currency;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Counteragent;
use App\Model\Product;
use App\Model\User;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Orchid\Platform\Dashboard;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Repositories\CurrencyRepository;

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
        EditableUseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        CurrencyRepository $currencyRepository,
        Dashboard $dashboard,
        ?Request $request = null
    ) {
        $this->dashboard = $dashboard;

        $dashboard->registerResource('scripts','https://cdn.jsdelivr.net/npm/vue@2.6.0');
        $dashboard->registerResource('scripts','/js/order.js');
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
        $rows = [
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

            Input::make($this->getDataPath(FieldNameInterface::ITEM_PRICE))
                ->title(FieldLabelInterface::ITEM_PRICE)
                ->required(),

            Input::make($this->getDataPath(FieldNameInterface::COUNT))
                ->title(FieldLabelInterface::COUNT)
                ->required(),

            Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                ->title(FieldLabelInterface::AMOUNT)
                ->readonly(),

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
                ->applyScope('courier'),

//            Input::make($this->getDataPath(FieldNameInterface::INCOMES))
//                ->title(FieldLabelInterface::INCOMES),

//                Relation::make($this->getDataPath(FieldNameInterface::COUNTERAGENT_ID))
//                    ->title(FieldLabelInterface::COUNTERAGENT_ID)
//                    ->required()
//                    ->fromModel(
//                        Counteragent::class,
//                        CounteragentItemFieldNameInterface::NAME,
//                        CounteragentItemFieldNameInterface::ID
//                    ),
        ];

        $rows = $this->addIncomesRows($rows);

        $rows[] = TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
            ->title(FieldLabelInterface::NOTE);


        return [
            Layout::rows($rows)
        ];
    }

    private function addIncomesRows($rows)
    {
        $incomesRows = $this->getIncomesRows();

        return array_merge($rows, $incomesRows);
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

    private function getAvailableCurrencies(): Collection
    {
        return $this->currencyRepository->getAvailableCurrencies();
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
