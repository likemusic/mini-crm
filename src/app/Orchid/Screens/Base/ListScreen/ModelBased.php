<?php

namespace App\Orchid\Screens\Base\ListScreen;

use App\Contract\Entity\Base\NotEditableUseVariantProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Orchid\Screens\Base\ListScreen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class ModelBased extends ListScreen
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(
        Model $model,
        NotEditableUseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        ?Request $request = null)
    {
        $this->model = $model;

        parent::__construct($useVariant, $routeNameProvider, $request);
    }

    /**
     * @return LengthAwarePaginator
     */
    protected function getData()
    {
        return $this->model->paginate();
    }
}
