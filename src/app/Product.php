<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
