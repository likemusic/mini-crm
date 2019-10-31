<?php

namespace App\Entity\ProductCategory;

use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ProductCategory extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::NOTE,
        FieldNameInterface::APPROXIMATE_PRICE,
        FieldNameInterface::SELLING_PRICE,
    ];
}
