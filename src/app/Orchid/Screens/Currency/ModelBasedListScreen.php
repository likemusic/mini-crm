<?php

namespace App\Orchid\Screens\Currency;

use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Entity\Currency\EditableUseVariantProvider;
use App\Model\Currency;
use App\Orchid\Layouts\Currency\CurrencyListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Currency $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return CurrencyListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return CurrencyListLayout::class;
    }
}
