<?php

namespace App\Model;

use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Orchid\Screen\AsSource;
use App\Model\ProductCategory;
use App\DataProviders\PharmacyDataProvider;

class Pharmacy extends Model
{
    use AsSource;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products as p';

    /**
     * @var PharmacyDataProvider
     */
    private $pharmacyDataProvider;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    public function newModelQuery()
    {
        $modelQuery = parent::newModelQuery();

        $query = $modelQuery->getQuery();

//        $this->addJoins($query);

        return $modelQuery;
    }

    private function addJoins(Builder $query)
    {
        $this->pharmacyDataProvider->addJoins($query);
    }

}
