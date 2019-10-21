<?php

namespace App\Model;

use App\Database\Eloquent\Builder as ExtendedEloquentBuilder;
use App\Database\Eloquent\Model;
use App\DataProviders\PharmacyDataProvider;
use Illuminate\Database\Query\Builder;
use Orchid\Screen\AsSource;

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

    public function __construct(PharmacyDataProvider $pharmacyDataProvider, array $attributes = [])
    {
        $this->pharmacyDataProvider = $pharmacyDataProvider;
        parent::__construct($attributes);
    }

    public function newModelQuery()
    {
        $newBaseQueryBuilder = $this->newBaseQueryBuilder();
        $newEloquentBuilder = $this->newEloquentBuilder($newBaseQueryBuilder);

        $productTableAlias = 'p';
//        $newEloquentBuilder->setModelWithTableAlias($this, $productTableAlias);
        $newEloquentBuilder->setModel($this);

        $query = $newEloquentBuilder->getQuery();

        $this->addJoins($query, $productTableAlias);

        return $newEloquentBuilder;
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return ExtendedEloquentBuilder|static
     */
    public function newEloquentBuilder($query)
    {
        return new ExtendedEloquentBuilder($query);
    }

    private function addJoins(Builder $query, string $productTableAlias)
    {
        $this->pharmacyDataProvider->addJoins($query, $productTableAlias);
    }

}
