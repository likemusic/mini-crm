<?php

namespace App\Entity\User;

use Illuminate\Support\Facades\DB;
use App\Entity\User\User;
use App\Entity\Role\Role;
use App\Entity\Currency\Currency;
use App\Entity\User\Helper\ShouldHaveWalletsResolver as ShouldUserHaveWalletsResolver;
use App\Entity\Currency\DataProvider\AvailableCurrenciesProvider;

class Manager
{
    /** @var ShouldUserHaveWalletsResolver */
    private $shouldUserHaveWalletsResolver;

    /** @var AvailableCurrenciesProvider */
    private $availableCurrenciesProvider;

    public function __construct(
        ShouldUserHaveWalletsResolver $shouldUserHaveWalletsResolver,
        AvailableCurrenciesProvider $availableCurrenciesProvider
    )
    {
        $this->shouldUserHaveWalletsResolver = $shouldUserHaveWalletsResolver;
        $this->availableCurrenciesProvider = $availableCurrenciesProvider;
    }

    public function addUser(User $user, array $roles)
    {
        DB::transaction(function () use ($user, $roles) {
            $this->saveUser($user, $roles);
            $this->addUserWalletsIfRequired($user);
        });
    }

    private function addUserWalletsIfRequired(User $user)
    {
        if (!$this->isAddNewUserWalletsRequired($user)) {
            return;
        }

        $this->addUserWallets($user);
    }

    private function addUserWallets(User $user)
    {
        $availableCurrencies = $this->getAvailableCurrencies();
        $wallets = $this->createWalletsByCurrencies($availableCurrencies);

        $user->wallets()->saveMany($wallets);
    }

    /**
     * @return Currency[]
     */
    private function getAvailableCurrencies(): array
    {
        return $this->availableCurrenciesProvider->getAvailableCurrencies();
    }

    private function isAddNewUserWalletsRequired(User $user)
    {
        if (!$this->isUserShouldHaveWallets($user)) {
            return false;
        }

        if ($this->userHaveWallets($user)) {
            return false;
        }

        return true;
    }

    private function userHaveWallets(User $user): bool
    {
        return (bool) $user->wallets()->count();
    }

    private function isUserShouldHaveWallets(User $user)
    {
        return $this->shouldUserHaveWalletsResolver->isUserShouldHaveWallets($user);
    }

    private function saveUser(User $user, $roles)
    {
        $user->save();
        $user->roles()->save($roles);
    }
}
