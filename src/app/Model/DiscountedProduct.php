<?php

namespace App\Model;

use App\Contract\Entity\DiscountedProduct\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class DiscountedProduct extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::PRODUCT_ID,
        FieldNameInterface::NOTE,
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
