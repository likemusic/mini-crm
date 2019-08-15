<?php

namespace App\Model;

use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::ITEMS,
        FieldNameInterface::TOTAL_AMOUNT,
        FieldNameInterface::NOTE,
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
