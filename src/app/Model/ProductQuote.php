<?php

namespace App\Model;

use App\Contract\Entity\ProductQuote\Field\NameInterface as ProductFieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ProductQuote extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        ProductFieldNameInterface::NAME,
        ProductFieldNameInterface::NOTE,
        ProductFieldNameInterface::APPROXIMATE_PRICE,
        ProductFieldNameInterface::SELLING_PRICE,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
