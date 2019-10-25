<?php

namespace App\Orchid\Screens\ProductCategory;

use App\Entity\ProductCategory\CrudUseVariantProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Model\ProductCategory;
use App\Orchid\Layouts\ProductCategory\ProductCategoryListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        ProductCategory $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    )
    {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return ProductCategoryListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return ProductCategoryListLayout::class;
    }
}
