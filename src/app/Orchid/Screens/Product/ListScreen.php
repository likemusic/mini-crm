<?php

namespace App\Orchid\Screens\Product;

use App\Entity\Product\EditableUseVariantProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Model\Product;
use App\Orchid\Layouts\Product\ProductListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        Product $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    )
    {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return ProductListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return ProductListLayout::class;
    }
}
