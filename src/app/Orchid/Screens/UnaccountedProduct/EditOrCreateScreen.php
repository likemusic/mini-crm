<?php

namespace App\Orchid\Screens\UnaccountedProduct;

use App\Contract\Entity\UnaccountedProduct\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\UnaccountedProduct\Field\NameInterface as FieldNameInterface;
use App\Entity\UnaccountedProduct\Route\NameProvider as RouteNameProvider;
use App\Entity\UnaccountedProduct\CrudUseVariantProvider as UseVariant;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\UnaccountedProduct as InfoMessageProvider;
use App\Model\UnaccountedProduct;
use App\Orchid\Screens\Base\EditOrCreateScreen as BaseEditScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;

class EditOrCreateScreen extends BaseEditScreen
{
    public function __construct(
        RouteNameProvider $routeNameProvider,
        UseVariant $useVariant,
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
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                TextArea::make($this->getDataPath(FieldNameInterface::NOTE))
                    ->title(FieldLabelInterface::NOTE),
            ])
        ];
    }

    public function createOrUpdate(UnaccountedProduct $model, Request $request)
    {
        return $this->onCreateOrUpdate($model, $request);
    }

    public function query(UnaccountedProduct $model): array
    {
        return $this::onQuery($model);
    }
}
