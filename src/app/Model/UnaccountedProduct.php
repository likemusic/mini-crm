<?php

namespace App\Model;

use App\Contract\Entity\UnaccountedProduct\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class UnaccountedProduct extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::NOTE,
    ];
}
