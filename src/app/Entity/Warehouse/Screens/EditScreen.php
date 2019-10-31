<?php

namespace App\Entity\Warehouse\Screens;

use App\Contract\Entity\Warehouse\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Warehouse\Field\LengthInterface as FieldLengthInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Entity\Warehouse\InfoMessageProvider as InfoMessageProvider;
use App\Entity\Warehouse\Warehouse;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
use App\Orchid\Screens\Warehouse\CrudUseVariantProvider;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditScreen extends BaseEditScreen
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        CrudUseVariantProvider $useVariant,
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
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::CODE))
                    ->title(FieldLabelInterface::CODE)
                    ->size(FieldLengthInterface::CODE),

                Input::make($this->getDataPath(FieldNameInterface::SORT_ORDER))
                    ->title(FieldLabelInterface::SORT_ORDER),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(Warehouse $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Warehouse $model): array
    {
        return $this::onQuery($model);
    }
}
