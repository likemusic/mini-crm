<?php

declare(strict_types=1);

namespace App\Entity\Settings\Screens;

use App\Contract\Entity\Settings\Field\NameInterface as FieldNameInterface;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use App\Entity\Settings\CrudUseVariantProvider;
use App\Entity\Settings\Layouts\ListLayout;
use App\Entity\Settings\NamesProvider;
use App\Entity\Settings\Route\NameProvider as RouteNameProvider;
use App\Entity\Settings\Settings;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    public function __construct(
        Settings $model,
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
        return [FieldNameInterface::KEY, 'asc'];
    }
}
