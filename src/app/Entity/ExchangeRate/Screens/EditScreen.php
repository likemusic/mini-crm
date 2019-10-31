<?php

namespace App\Entity\ExchangeRate\Screens;

use App\Contract\Entity\Currency\Field\NameInterface as CurrencyFieldNameInterface;
use App\Contract\Entity\ExchangeRate\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Entity\ExchangeRate\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\CurrenciesListProvider;
use App\Helper\InfoMessageProvider\ExchangeRate as InfoMessageProvider;
use App\Model\Currency;
use App\Model\ExchangeRate;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
use App\Orchid\Screens\ExchangeRate\CrudUseVariantProvider;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditScreen extends BaseEditScreen
{
    /**
     * @var CurrenciesListProvider
     */
    private $currenciesListProvider;

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
                Select::make($this->getDataPath(FieldNameInterface::FROM_CURRENCY_ID))
                    ->fromModel(Currency::class, CurrencyFieldNameInterface::CODE)
                    ->title(FieldLabelInterface::FROM_CURRENCY_CODE),

                Select::make($this->getDataPath(FieldNameInterface::TO_CURRENCY_ID))
                    ->fromModel(Currency::class, CurrencyFieldNameInterface::CODE)
                    ->title(FieldLabelInterface::TO_CURRENCY_CODE),

                Input::make($this->getDataPath(FieldNameInterface::RATE))
                    ->title(FieldLabelInterface::RATE),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(ExchangeRate $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(ExchangeRate $model): array
    {
        return $this::onQuery($model);
    }
}
