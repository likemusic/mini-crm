<?php

namespace App\Entity\Wallet\Screens;

use App\Contract\Entity\Wallet\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Entity\Wallet\InfoMessageProvider as InfoMessageProvider;
use App\Entity\Counteragent\Counteragent;
use App\Entity\User\User;
use App\Entity\Wallet\Wallet;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
use App\Orchid\Screens\Wallet\CrudUseVariantProvider;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Entity\Currency\CurrenciesListProvider;

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
        $walletOwnerTypes = $this->getWalletOwnerTypes();

        return [
            Layout::rows([
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::OWNER_ID))
                    ->title(FieldLabelInterface::OWNER_ID),
//                Relation::make($this->getDataPath(FieldNameInterface::OWNER_ID))
//                    ->title(FieldLabelInterface::OWNER)
//                    ->required()
////                    ->placeholder('Уцененный товар')
////                    ->help('Выберите товар для уцененки.')
//                    ->fromModel(
//                        User::class,
//                        UserFieldNameInterface::NAME,
//                        UserFieldNameInterface::ID
//                    ),

                Select::make($this->getDataPath(FieldNameInterface::OWNER_TYPE))
                    ->title(FieldLabelInterface::OWNER_TYPE)
                    ->options($walletOwnerTypes),

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

    private function getWalletOwnerTypes()
    {
        return [
            User::class => 'Пользователь',
            Counteragent::class => 'Контрагент',
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
