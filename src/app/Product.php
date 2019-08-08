<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Contract\Entity\ProductInterface;

class Product extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        ProductInterface::FIELD_NAME,
        ProductInterface::FIELD_NOTE,
    ];
}
