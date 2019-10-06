<?php

namespace App\Model;

use App\Contract\Entity\MoneyChange\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class MoneyChange extends Model
{
    use AsSource;

//    protected $with = [FieldNameInterface::CATEGORY];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::WALLET_ID,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::NOTE,
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
