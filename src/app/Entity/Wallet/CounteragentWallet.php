<?php

namespace App\Entity\Wallet;

use App\Entity\Counteragent\Counteragent;
use App\Entity\User\User;
use App\Entity\Wallet\Wallet;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;

class CounteragentWallet extends Wallet
{
    protected $attributes = [
        FieldNameInterface::OWNER_TYPE => Counteragent::class
    ];
}
