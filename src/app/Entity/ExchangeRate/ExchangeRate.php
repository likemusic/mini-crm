<?php

namespace App\Entity\ExchangeRate;

use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Entity\Currency\Currency;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ExchangeRate extends Model
{
    use AsSource;

    protected $with = ['fromCurrency', 'toCurrency'];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::FROM_CURRENCY_ID,
        FieldNameInterface::TO_CURRENCY_ID,
        FieldNameInterface::RATE,
        FieldNameInterface::NOTE,
    ];

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class,FieldNameInterface::FROM_CURRENCY_ID);
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class,FieldNameInterface::TO_CURRENCY_ID);
    }
}
