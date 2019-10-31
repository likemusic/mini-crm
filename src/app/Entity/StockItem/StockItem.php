<?php

namespace App\Entity\StockItem;

use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\Product;
use App\Entity\Warehouse\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class StockItem extends Model
{
    use AsSource;

    protected $with = [FieldNameInterface::PRODUCT, FieldNameInterface::WAREHOUSE];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::PRODUCT_ID,
        FieldNameInterface::WAREHOUSE_ID,
        FieldNameInterface::QUANTITY,
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
