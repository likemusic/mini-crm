<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Currency;

use App\Entity\Currency\CrudUseVariantProvider;
use App\Entity\Currency\NamesProvider;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Model\Currency;
use App\Orchid\Layouts\Currency\ListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;
use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        Currency $model,
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
        return [FieldNameInterface::ID, 'asc'];
    }
}
