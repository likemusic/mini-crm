<?php

namespace App\Model;

use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Repositories\OrderRepository;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::DATETIME,
        FieldNameInterface::DATE_ORDER_ID,
        FieldNameInterface::PRODUCT_QUOTE_ID,
        FieldNameInterface::IMEIES,
        FieldNameInterface::COUNT,
        FieldNameInterface::AMOUNT,
        FieldNameInterface::PROVIDER_ID,
        FieldNameInterface::BUYER_ID,
        FieldNameInterface::COURIER_ID,
//        FieldNameInterface::INCOMES,
        FieldNameInterface::NOTE,
    ];

    /**
     * @var OrderRepository
     */
    private $orderRepository;

//    protected $attributes = [
//        FieldNameInterface::DATETIME => new \DateTime(),
//    ];

    public function __construct(OrderRepository $orderRepository, array $attributes = [])
    {
        $this->orderRepository = $orderRepository;
        parent::__construct($attributes);
    }

    public function getDatetimeAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return date('Y-m-d H:i:s');
    }

    public function getDateOrderIdAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return $this->getNextDateOrderId();
    }

    private function getNextDateOrderId()
    {
        return $this->orderRepository->getNextDateOrderId();
    }

    public function productQuote()
    {
        return $this->hasOne(ProductQuote::class);
    }

    public function provider()
    {
        return $this->belongsTo(Counteragent::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Counteragent::class);
    }

    public function courier()
    {
        return $this->belongsTo(User::class);
    }

//    public function incomes()
//    {
//        return $this->hasManyThrough(OrderMoneyChange, MoneyChange::class);
//    }
}
