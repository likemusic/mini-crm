<?php

namespace App\Model\Wallet;

use App\Model\User;
use App\Model\Wallet;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;

class UserWallet extends Wallet
{
    protected $attributes = [
        FieldNameInterface::OWNER_TYPE => User::class
    ];
}
