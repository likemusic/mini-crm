<?php

namespace App\Entity\Warehouse;

use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Warehouse extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        FieldNameInterface::NAME,
        FieldNameInterface::CODE,
        FieldNameInterface::NOTE,
    ];
}
