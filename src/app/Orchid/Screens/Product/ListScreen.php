<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Product;

use App\Entity\Product\CrudUseVariantProvider;
use App\Entity\Product\NamesProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Model\Product;
use App\Entity\Product\Layouts\ListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        Product $model,
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
        return [FieldNameInterface::ID, 'desc'];
    }
}
