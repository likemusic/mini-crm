<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Role;

use App\Contract\Entity\Permission\Platform\NameInterface as PermissionNameInterface;
use App\Contract\Entity\Permission\Platform\Systems\NameInterface as SystemsNameInterface;
use App\Orchid\Layouts\Role\RoleListLayout;
use Illuminate\Http\Request;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Contract\Entity\Role\Route\NameInterface as RoleRouteNameInterface;
use App\Entity\Role\Route\NameProvider as RoleRouteNameProvider;

class RoleListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Roles';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Access rights';

    /**
     * @var string
     */
    public $permission = SystemsNameInterface::ROLES;

    /**
     * @var RoleRouteNameProvider
     */
    private $roleRouteNameProvider;

    public function __construct(RoleRouteNameProvider $roleRouteNameProvider, ?Request $request = null)
    {
        $this->roleRouteNameProvider = $roleRouteNameProvider;
        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'roles' => Role::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::make(__('Add'))
                ->href(route($this->getRoleCreateRouteName()))
                ->icon('icon-plus'),
        ];
    }

    private function getRoleCreateRouteName()
    {
        return $this->roleRouteNameProvider->getCreate();
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            RoleListLayout::class,
        ];
    }
}
