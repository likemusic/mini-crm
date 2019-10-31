<?php

namespace App\Entity\Wallet;

use App\Entity\User\User;
use App\Entity\Wallet\Wallet;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;

class UserWallet extends Wallet
{
    protected $attributes = [
        FieldNameInterface::OWNER_TYPE => User::class
    ];
}
