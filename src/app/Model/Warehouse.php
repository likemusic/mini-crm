<?php

namespace App\Model;

use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Warehouse extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        WarehouseFieldNameInterface::NAME,
        WarehouseFieldNameInterface::CODE,
        WarehouseFieldNameInterface::NOTE,
    ];
}
