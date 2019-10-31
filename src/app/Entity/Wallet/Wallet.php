<?php

namespace App\Entity\Wallet;

use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Wallet extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::OWNER_ID,
        FieldNameInterface::OWNER_TYPE,
        FieldNameInterface::CURRENCY_CODE,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::NOTE,
    ];

//    protected $attributes = [
//        FieldNameInterface::AMOUNT => 0,
//    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
