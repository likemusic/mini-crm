<?php

namespace App\Orchid\Screens\Counteragent;

use App\Entity\Counteragent\Route\NameProvider as RouteNameProvider;
use App\Entity\Counteragent\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Model\Counteragent;
use App\Orchid\Layouts\Counteragent\CounteragentListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Counteragent $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return CounteragentListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return CounteragentListLayout::class;
    }
}
