<?php

namespace App\Entity\ExchangeRate\Screens;

use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Entity\ExchangeRate\CrudUseVariantProvider;
use App\Entity\ExchangeRate\ExchangeRate;
use App\Entity\ExchangeRate\Layouts\ExchangeRateListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        ExchangeRate $model,
        CrudUseVariantProvider $useVariant,
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
