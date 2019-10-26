<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Role;

use App\Entity\Role\CrudUseVariantProvider;
use App\Entity\Role\NamesProvider;
use App\Entity\Role\Route\NameProvider as RoleRouteNameProvider;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Model\Role;
use App\Orchid\Layouts\Role\ListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;

class ListScreen extends BaseListScreen
{
    use PermissionsClassNameTrait;

    /**
     * @var RoleRouteNameProvider
     */
    private $roleRouteNameProvider;

    public function __construct(
        Role $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        NamesProvider $namesProvider,
        ?Request $request = null
    )
    {
        parent::__construct($model, $useVariant, $routeNameProvider, $namesProvider, $request);
    }

    /**
     * Query data.
     *
     * @return array
     */
    /*    public function query(): array
        {
            return [
                'roles' => Role::filters()->defaultSort('id', 'desc')->paginate(),
            ];
        }*/

    protected function hasFilters(): bool
    {
        return true;
    }

    protected function getDefaultSort()
    {
        return ['id', 'desc'];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
//    public function commandBar(): array
//    {
//        return [
//            Link::make(__('Add'))
//                ->href(route($this->getRoleCreateRouteName()))
//                ->icon('icon-plus'),
//        ];
//    }

//    private function getRoleCreateRouteName()
//    {
//        return $this->roleRouteNameProvider->getCreate();
//    }

    protected function getLayoutClassName(): string
    {
        return ListLayout::class;
    }
}
