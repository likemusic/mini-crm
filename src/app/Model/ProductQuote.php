<?php

namespace App\Model;

use App\Contract\Entity\ProductQuote\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ProductQuote extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::PRODUCT_ID,
        FieldNameInterface::NAME,
        FieldNameInterface::NOTE,
        FieldNameInterface::APPROXIMATE_PRICE,
        FieldNameInterface::SELLING_PRICE,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
