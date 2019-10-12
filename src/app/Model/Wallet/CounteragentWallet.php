<?php

namespace App\Model\Wallet;

use App\Model\Counteragent;
use App\Model\User;
use App\Model\Wallet;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;

class CounteragentWallet extends Wallet
{
    protected $attributes = [
        FieldNameInterface::OWNER_TYPE => Counteragent::class
    ];
}
