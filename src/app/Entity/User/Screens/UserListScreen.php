<?php

declare(strict_types=1);

namespace App\Entity\User\Screens;

use App\Orchid\Screens\User\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use App\Entity\User\User;
use Orchid\Support\Facades\Alert;
use App\Entity\User\Layouts\UserEditLayout;
use App\Entity\User\Layouts\UserListLayout;
use App\Entity\User\Layouts\UserFiltersLayout;

class UserListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Users';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All registered users';

    /**
     * @var string
     */
    public $permission = 'platform.systems.users';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        return  [
            'users'  => User::with('roles')
                ->filters()
                ->filtersApplySelection(UserFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar() : array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout() : array
    {
        return [
            UserFiltersLayout::class,
            UserListLayout::class,

            Layout::modal('oneAsyncModal', [
                UserEditLayout::class,
            ])->async('asyncGetUser'),
        ];
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetUser(User $user) : array
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param User    $user
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveUser(User $user, Request $request)
    {
        $user->fill($request->get('user'))
            ->save();

        Alert::info(__('User was saved.'));

        return back();
    }
}
