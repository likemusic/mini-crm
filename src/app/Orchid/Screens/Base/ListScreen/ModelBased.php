<?php

namespace App\Orchid\Screens\Base\ListScreen;

use App\Contract\Entity\Base\NamesProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as ListUseVariantProviderInterface;
use App\Orchid\Screens\Base\ListScreen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class ModelBased extends ListScreen
{
    /**
     * @var NamesProviderInterface
     */
    protected $namesProvider;
    /**
     * @var Model
     */
    protected $model;

    public function __construct(
        Model $model,
        ListUseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        NamesProviderInterface $namesProvider,
        ?Request $request = null)
    {
        $this->model = $model;

        parent::__construct($useVariant, $routeNameProvider, $namesProvider, $request);
    }

    protected function isFilterable(): bool
    {
        $model = $this->model;

        return method_exists($model, 'scopeFilters');
    }

    abstract protected function getDefaultSort();

    /**
     * @return LengthAwarePaginator
     */
    protected function getData()
    {
        $model = $this->model;
        $builder = $model->newQuery();

        if ($this->isFilterable()) {
            $builder->filters();

            if ($defaultSort = $this->getDefaultSort()) {
                [$fieldName, $order] = $defaultSort;
                $builder->defaultSort($fieldName, $order);
            }
        }


        return $builder->paginate();
    }

    protected function getDataKey(): string
    {
        return $this->namesProvider->getListDataKey();
    }
}
