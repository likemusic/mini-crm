<?php

namespace App\Model;

use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Model\ProductCategory;

class Product extends Model
{
    use AsSource;

    protected $with = [FieldNameInterface::CATEGORY];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::CATEGORY_ID,
        FieldNameInterface::NOTE,
        FieldNameInterface::APPROXIMATE_PRICE,
        FieldNameInterface::SELLING_PRICE,
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
