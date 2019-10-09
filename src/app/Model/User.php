<?php

namespace App\Model;

use Orchid\Platform\Models\User as Authenticatable;
use App\Contract\Entity\Wallet\Field\NameInterface as WalletFieldNameInterface;

class User extends Authenticatable
{
    public function wallets()
    {
        return $this->morphMany(Wallet::class, WalletFieldNameInterface::OWNER);
    }
}
