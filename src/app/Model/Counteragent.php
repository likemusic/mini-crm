<?php

namespace App\Model;

use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Contract\Entity\Wallet\Field\NameInterface as WalletFieldNameInterface;

class Counteragent extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::NOTE,
    ];

    public function wallets()
    {
        return $this->morphMany(Wallet::class, WalletFieldNameInterface::OWNER);
    }
}
