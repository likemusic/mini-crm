<?php

namespace App\Model;

use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class StockItem extends Model
{
    use AsSource;

//    protected $with = [FieldNameInterface::CATEGORY];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::PRODUCT_ID,
        FieldNameInterface::WAREHOUSE_ID,
        FieldNameInterface::NOTE,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
