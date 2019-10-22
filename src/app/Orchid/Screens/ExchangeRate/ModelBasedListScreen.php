<?php

namespace App\Orchid\Screens\ExchangeRate;

use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Entity\ExchangeRate\EditableUseVariantProvider;
use App\Model\ExchangeRate;
use App\Orchid\Layouts\ExchangeRate\ExchangeRateListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        ExchangeRate $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return ExchangeRateListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return ExchangeRateListLayout::class;
    }
}
