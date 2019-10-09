<?php

namespace App\Model;

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
        FieldNameInterface::CURRENCY_CODE,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::NOTE,
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
