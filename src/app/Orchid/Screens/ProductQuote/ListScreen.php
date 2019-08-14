<?php

namespace App\Orchid\Screens\ProductQuote;

use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\UseVariantProvider as UseVariant;
use App\Model\ProductQuote;
use App\Orchid\Layouts\ProductQuote\ProductQuoteListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
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
        return 'product_quotes';
    }

    protected function getLayoutClassName(): string
    {
        return ProductQuoteListLayout::class;
    }
}
