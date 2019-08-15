<?php

namespace App\Model;

use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ExchangeRate extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::FROM_CURRENCY_CODE,
        FieldNameInterface::TO_CURRENCY_CODE,
        FieldNameInterface::RATE,
        FieldNameInterface::NOTE,
    ];
}
