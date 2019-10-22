<?php

namespace App\Orchid\Screens\ProductCategory;

use App\Contract\Entity\Permission\Crm\Product\Category\NameInterface as PermissionNameInterface;
use App\Contract\Entity\ProductCategory\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as FieldNameInterface;
use App\Entity\ProductCategory\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\ProductCategory;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

trait EditTrait
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        EditableUseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        ?Request $request = null
    )
    {
        parent::__construct($routeNameProvider, $useVariant, $infoMessageProvider, $breadcrumbsHelper, $request);
    }

    public function query(ProductCategory $model): array
    {
        return $this::onQuery($model);
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

    protected function getDataKey(): string
    {
        return 'category';
    }

    protected function getPermissionsClassName(): string
    {
        return PermissionNameInterface::class;
    }
}