<?php

namespace App\Orchid\Screens\ProductQuote;

use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\CrudUseVariantProvider as UseVariant;
use App\Model\ProductQuote;
use App\Entity\ProductQuote\Layouts\ProductQuoteListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        ProductQuote $model,
        UseVariant $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return ProductQuoteListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return ProductQuoteListLayout::class;
    }
}
