<?php

namespace App\Orchid\Screens\Warehouse;

use App\Contract\Entity\Warehouse\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Warehouse\Field\LengthInterface as FieldLengthInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\UseVariantProvider as UseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Warehouse as InfoMessageProvider;
use App\Model\Warehouse;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
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
