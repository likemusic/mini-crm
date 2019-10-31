<?php

namespace App\Entity\Counteragent\Screens;

use App\Entity\Counteragent\Route\NameProvider as RouteNameProvider;
use App\Entity\Counteragent\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Entity\Counteragent\Counteragent;
use App\Entity\Counteragent\Layouts\CounteragentListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use App\Orchid\Screens\Counteragent\CrudUseVariantProvider;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Counteragent $model,
        CrudUseVariantProvider $useVariant,
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
