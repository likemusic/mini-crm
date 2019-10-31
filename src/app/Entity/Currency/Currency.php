<?php

namespace App\Entity\Currency;

use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Currency extends Model
{
    use AsSource;

//    protected $with = [FieldNameInterface::CATEGORY];

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::CODE,
    ];
}
