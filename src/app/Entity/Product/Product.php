<?php

namespace App\Entity\Product;

use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Entity\ProductCategory\ProductCategory;
use Orchid\Filters\Filterable;

class Product extends Model
{
    use AsSource, Filterable;

    protected $allowedSorts = [
        'id',
//        'user_id',
//        'type',
//        'status',
//        'slug',
//        'publish_at',
//        'created_at',
//        'deleted_at',
    ];

    protected $with = [FieldNameInterface::CATEGORY];

    protected $casts = [
        FieldNameInterface::APPROXIMATE_PRICE => 'int',
        FieldNameInterface::SELLING_PRICE => 'int',
    ];
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
