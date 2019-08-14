<?php

namespace App\Model;

use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class OrderItem extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::PRODUCT_QUOTE_ID,
        FieldNameInterface::SELLING_PRICE,
        FieldNameInterface::COUNT,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::NOTE,
    ];
}
