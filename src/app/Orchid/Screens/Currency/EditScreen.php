<?php

namespace App\Orchid\Screens\Currency;

use App\Contract\Entity\Currency\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Entity\Currency\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\Currency;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Model\ProductCategory;

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
                Input::make($this->getDataPath(FieldNameInterface::CODE))
                    ->title(FieldLabelInterface::CODE),

                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::SORT_ORDER))
                    ->title(FieldLabelInterface::SORT_ORDER),
            ])
        ];
    }

    public function createOrUpdate(Currency $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Currency $model): array
    {
        return $this::onQuery($model);
    }
}
