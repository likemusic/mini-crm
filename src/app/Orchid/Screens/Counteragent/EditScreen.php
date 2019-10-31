<?php

namespace App\Orchid\Screens\Counteragent;

use App\Contract\Entity\Counteragent\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Counteragent\Field\NameInterface as FieldNameInterface;
use App\Entity\Counteragent\Route\NameProvider as RouteNameProvider;
use App\Entity\Counteragent\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Counteragent as InfoMessageProvider;
use App\Model\Counteragent;
use App\Entity\Base\Screens\EditScreen as BaseEditScreen;
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

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(Counteragent $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(Counteragent $model): array
    {
        return $this::onQuery($model);
    }
}
