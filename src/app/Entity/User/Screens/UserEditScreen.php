<?php

declare(strict_types=1);

namespace App\Entity\User\Screens;

use App\Entity\User\Layouts\UserEditLayout;
use App\Entity\User\Layouts\UserRoleLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Orchid\Access\UserSwitch;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Entity\User\Route\NameProvider as UserRouteNameProvider;
use App\Contract\Common\IconNameInterface;

class UserEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'User';

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
     * @var UserRouteNameProvider
     */
    private $userRouteNameProvider;

    public function __construct(UserRouteNameProvider $userRouteNameProvider, ?Request $request = null)
    {
        $this->userRouteNameProvider = $userRouteNameProvider;
        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @param \Orchid\Platform\Models\User $user
     *
     * @return array
     */
    public function query(User $user): array
    {
        $user->load(['roles']);

        return [
            'user' => $user,
            'permission' => $user->getStatusPermission(),
        ];
    }

    /**
     * Button commands.
     *
     * @return DropDown[]
     */
    public function commandBar(): array
    {
        return [

            DropDown::make(__('Settings'))
                ->icon(IconNameInterface::OPEN)
                ->list([
                    Button::make(__('Login as user'))
                        ->method('loginAs')
                        ->icon(IconNameInterface::LOGIN),

                    ModalToggle::make(__('Change Password'))
                        ->icon(IconNameInterface::LOCK_OPEN)
                        ->title(__('Change Password'))
                        ->method('changePassword')
                        ->modal('password'),
                ]),

            Button::make(__('Save'))
                ->method('save')
                ->icon(IconNameInterface::CHECK),

            Button::make(__('Remove'))
                ->method('remove')
                ->icon(IconNameInterface::TRASH),
        ];
    }

    /**
     * @throws \Throwable
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            UserEditLayout::class,
            UserRoleLayout::class,

            Layout::modal('password', [
                Layout::rows([
                    Password::make('password')
                        ->title(__('Password'))
                        ->required()
                        ->placeholder(__('Enter your password')),
                ]),
            ]),
        ];
    }

    /**
     * @param \Orchid\Platform\Models\User $user
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(User $user, Request $request)
    {
        $permissions = $request->get('permissions', []);
        $roles = $request->input('user.roles', []);

        foreach ($permissions as $key => $value) {
            unset($permissions[$key]);
            $permissions[base64_decode($key)] = $value;
        }

        $user
            ->fill($request->get('user'))
            ->replaceRoles($roles)
            ->fill([
                'permissions' => $permissions,
            ])
            ->save();

        Alert::info(__('User was saved.'));

        return redirect()->route($this->getUserListRouteName());
    }

    private function getUserListRouteName()
    {
        return $this->userRouteNameProvider->getList();
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(User $user)
    {
        $user->delete();

        Alert::info(__('User was removed'));

        return redirect()->route($this->getUserListRouteName());
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAs(User $user)
    {
        UserSwitch::loginAs($user);

        return redirect()->route(config('platform.index'));
    }

    /**
     * @param User $user
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(User $user, Request $request)
    {
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Alert::info(__('User was saved.'));

        return back();
    }
}
