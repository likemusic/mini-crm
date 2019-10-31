<?php

declare(strict_types=1);

namespace App\Entity\ProductCategory\Screens;

use App\Entity\ProductCategory\CrudUseVariantProvider;
use App\Entity\ProductCategory\NamesProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductCategory\ProductCategory;
use App\Entity\ProductCategory\Layouts\ListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use App\Entity\ProductCategory\Screens\PermissionsClassNameTrait;
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

    protected function getDefaultSort()
    {
        return null;
    }
}
