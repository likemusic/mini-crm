<?php

declare(strict_types=1);

namespace App\Entity\Role\Screens;

use App\Contract\Entity\Permission\Platform\NameInterface as PermissionNameInterface;
use App\Contract\Entity\Permission\Platform\Systems\NameInterface as SystemsNameInterface;
use App\Entity\Role\Layouts\RoleEditLayout;
use App\Entity\Role\Layouts\RolePermissionLayout;
use App\Orchid\Screens\Role\Layout;
use Illuminate\Http\Request;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Dashboard;
use App\Contract\Common\IconNameInterface;
use App\Contract\Entity\Role\Route\NameInterface as RoleRouteNameInterface;
use App\Entity\Role\Route\NameProvider as RoleRouteNameProvider;

class RoleEditScreen extends Screen
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
     * @var bool
     */
    private $exist = false;

    /**
     * @var RoleRouteNameProvider
     */
    private $roleRouteNameProvider;

    public function __construct(RoleRouteNameProvider $roleRouteNameProvider,?Request $request = null)
    {
        $this->roleRouteNameProvider = $roleRouteNameProvider;
        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @param Role $role
     *
     * @return array
     */
    public function query(Role $role): array
    {
        $this->exist = $role->exists;

        $rolePermission = $role->permissions ?? [];
        $permission = Dashboard::getPermission()
            ->sort()
            ->transform(function ($group) use ($rolePermission) {
                $group = collect($group)->sortBy('description')->toArray();

                foreach ($group as $key => $value) {
                    $group[$key]['active'] = array_key_exists($value['slug'], $rolePermission);
                }

                return $group;
            });

        return [
            'permission' => $permission,
            'role' => $role,
        ];
    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        return [
            Button::make(__('Save'))
                ->icon(IconNameInterface::CHECK)
                ->method('save'),

            Button::make(__('Remove'))
                ->icon(IconNameInterface::TRASH)
                ->method('remove')
                ->canSee($this->exist),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            RoleEditLayout::class,
            RolePermissionLayout::class,
        ];
    }

    /**
     * @param Role $role
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Role $role, Request $request)
    {
        $role->fill($request->get('role'));

        foreach ($request->get('permissions', []) as $key => $value) {
            $permissions[base64_decode($key)] = 1;
        }

        $role->permissions = $permissions ?? [];
        $role->save();

        Alert::info(__('Role was saved'));

        return redirect()->route($this->getRoleListRouteName());
    }

    private function getRoleListRouteName()
    {
        return $this->roleRouteNameProvider->getList();
    }

    /**
     * @param Role $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Role $role)
    {
        $role->delete();

        Alert::info(__('Role was removed'));

        return redirect()->route($this->getRoleListRouteName());
    }
}