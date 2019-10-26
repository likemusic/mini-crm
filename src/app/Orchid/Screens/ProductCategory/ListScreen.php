<?php

declare(strict_types=1);

namespace App\Orchid\Screens\ProductCategory;

use App\Entity\ProductCategory\CrudUseVariantProvider;
use App\Entity\ProductCategory\NamesProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Model\ProductCategory;
use App\Orchid\Layouts\ProductCategory\ListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        ProductCategory $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        NamesProvider $namesProvider,
        ?Request $request = null
    )
    {
        parent::__construct($model, $useVariant, $routeNameProvider, $namesProvider, $request);
    }

    protected function getLayoutClassName(): string
    {
        return ListLayout::class;
    }

    protected function hasFilters(): bool
    {
        return false;
    }

    protected function getDefaultSort()
    {
        return null;
    }
}
