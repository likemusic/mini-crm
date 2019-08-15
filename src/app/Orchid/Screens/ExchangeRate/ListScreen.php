<?php

namespace App\Orchid\Screens\ExchangeRate;

use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Entity\ExchangeRate\UseVariantProvider;
use App\Model\ExchangeRate;
use App\Orchid\Layouts\ExchangeRate\ExchangeRateListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        ExchangeRate $model,
        UseVariantProvider $useVariant,
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
