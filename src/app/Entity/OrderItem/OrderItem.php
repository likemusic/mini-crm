<?php

namespace App\Entity\OrderItem;

use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Entity\Order\Order;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class OrderItem extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::ORDER_ID,
        FieldNameInterface::PRODUCT_QUOTE_ID,
        FieldNameInterface::SELLING_PRICE,
        FieldNameInterface::COUNT,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::NOTE,
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
