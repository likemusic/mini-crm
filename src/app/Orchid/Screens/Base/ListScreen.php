<?php

namespace App\Orchid\Screens\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProviderInterface;
use App\Contract\Screen\Table\CommandBar\AddInterface as AddCommandInterface;
use App\Orchid\Screens\Link;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Orchid\Screen\Layout;

abstract class ListScreen extends Screen
{
    /**
     * @var UseVariantProviderInterface
     */
    private $useVariant;
    /**
     * @var Model
     */
    private $model;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    public function __construct(
        Model $model,
        UseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        ?Request $request = null)
    {
        $this->useVariant = $useVariant;
        $this->model = $model;
        $this->routeNameProvider = $routeNameProvider;
        $this->name = $useVariant->getListName();

        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            $this->getDataKey() => $this->getData(),
        ];
    }

    /**
     * @return LengthAwarePaginator
     */
    protected function getData()
    {
        return $this->model->paginate();
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            $this->getLayoutClassName()
        ];
    }

    abstract protected function getLayoutClassName(): string;

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::name(AddCommandInterface::NAME)
                ->icon(AddCommandInterface::ICON)
                ->link(route($this->routeNameProvider->getNew()))
        ];
    }
}
