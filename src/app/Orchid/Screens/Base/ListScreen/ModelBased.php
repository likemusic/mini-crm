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
    private $model;

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

    abstract protected function hasFilters(): bool;

    abstract protected function getDefaultSort();

    /**
     * @return LengthAwarePaginator
     */
    protected function getData()
    {
        $model = $this->model;

        if ($this->hasFilters()) {
            $model->filters();
        }

        if ($defaultSort = $this->getDefaultSort()) {
            [$fieldName, $order] = $defaultSort;
            $model->defaultSort($fieldName, $order);
        }

        return $model->paginate();
    }

    protected function getDataKey(): string
    {
        return $this->namesProvider->getListDataKey();
    }
}
