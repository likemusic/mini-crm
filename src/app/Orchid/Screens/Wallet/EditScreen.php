<?php

namespace App\Orchid\Screens\Wallet;

use App\Contract\Entity\Wallet\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\UseVariantProvider as UseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Wallet as InfoMessageProvider;
use App\Model\User;
use App\Model\Wallet;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Helper\CurrenciesListProvider;

class EditScreen extends BaseEditScreen
{
    /**
     * @var CurrenciesListProvider
     */
    private $currenciesListProvider;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        UseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        CurrenciesListProvider $currenciesListProvider,
        ?Request $request = null
    ) {
        $this->currenciesListProvider = $currenciesListProvider;
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

                Relation::make($this->getDataPath(FieldNameInterface::OWNER_ID))
                    ->title(FieldLabelInterface::OWNER)
                    ->required()
//                    ->placeholder('Уцененный товар')
//                    ->help('Выберите товар для уцененки.')
                    ->fromModel(
                        User::class,
                        UserFieldNameInterface::NAME,
                        UserFieldNameInterface::ID
                    ),

                Select::make($this->getDataPath(FieldNameInterface::CURRENCY_CODE))
                    ->options($this->currenciesListProvider->getCurrenciesList())
                    ->title(FieldLabelInterface::CURRENCY_CODE),

                Input::make($this->getDataPath(FieldNameInterface::AMOUNT))
                    ->title(FieldLabelInterface::AMOUNT),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(Wallet $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Wallet $model): array
    {
        return $this::onQuery($model);
    }
}
