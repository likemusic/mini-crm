<?php

namespace App\Orchid\Screens\ProductCategory;

use App\Contract\Entity\ProductCategory\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as FieldNameInterface;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductCategory\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\ProductCategory;
use App\Orchid\Screens\Base\EditScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
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
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(ProductCategory $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(ProductCategory $model): array
    {
        return $this::onQuery($model);
    }
}
