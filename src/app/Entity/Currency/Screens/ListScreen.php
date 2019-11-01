<?php

declare(strict_types=1);

namespace App\Entity\Currency\Screens;

use App\Entity\Currency\CrudUseVariantProvider;
use App\Entity\Currency\NamesProvider;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Entity\Currency\Currency;
use App\Entity\Currency\Layouts\ListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use App\Entity\Currency\Screens\PermissionsClassNameTrait;
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