<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\Menu;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Dashboard;
use App\Contract\Entity\Permission\Platform\NameInterface as PermissionNameInterface;
use App\Contract\Entity\Permission\Platform\Systems\NameInterface as SystemsNameInterface;
use App\Contract\Entity\User\Route\NameInterface as UserRouteNameInterface;
use App\Contract\Entity\Role\Route\NameInterface as RoleRouteNameInterface;
use App\Entity\User\Route\NameProvider as UserRouteNameProvider;
use App\Entity\Role\Route\NameProvider as RoleRouteNameProvider;

class SystemMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @var UserRouteNameProvider
     */
    private $userRouteNameProvider;

    /**
     * @var RoleRouteNameProvider
     */
    private $roleRouteNameProvider;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     * @param UserRouteNameProvider $userRouteNameProvider
     * @param RoleRouteNameProvider $roleRouteNameProvider
     */
    public function __construct(
        Dashboard $dashboard,
        UserRouteNameProvider $userRouteNameProvider,
        RoleRouteNameProvider $roleRouteNameProvider
    ) {
        $this->dashboard = $dashboard;
        $this->userRouteNameProvider = $userRouteNameProvider;
        $this->roleRouteNameProvider = $roleRouteNameProvider;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        $this->dashboard->menu
            ->add(Menu::SYSTEMS,
                ItemMenu::label(__('Access rights'))
                    ->icon('icon-lock')
                    ->slug('Auth')
                    ->active('platform.systems.*')
                    ->permission(PermissionNameInterface::SYSTEMS)
                    ->sort(1000)
            )
            ->add('Auth',
                ItemMenu::label(__('Users'))
                    ->icon('icon-user')
                    ->route($this->getUserListRouteName())
                    ->permission(SystemsNameInterface::USERS)
                    ->sort(1000)
                    ->title(__('All registered users'))
            )
            ->add('Auth',
                ItemMenu::label(__('Roles'))
                    ->icon('icon-lock')
                    ->route($this->getRoleListRouteName())
                    ->permission(SystemsNameInterface::ROLES)
                    ->sort(1000)
                    ->title(__('A Role defines a set of tasks a user assigned the role is allowed to perform. '))
            );
    }

    private function getUserListRouteName()
    {
        return $this->userRouteNameProvider->getList();
    }

    private function getRoleListRouteName()
    {
        return $this->roleRouteNameProvider->getList();
    }
}
