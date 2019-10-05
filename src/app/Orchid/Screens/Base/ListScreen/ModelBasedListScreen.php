<?php

namespace App\Orchid\Screens\Base\ListScreen;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Screen\Table\CommandBar\AddInterface as AddCommandInterface;
use App\Orchid\Screens\Base\Screen;
use App\Orchid\Screens\Button;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;

abstract class ModelBasedListScreen extends BaseListScreen
{
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
        EditableUseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        ?Request $request = null)
    {
        $this->model = $model;
        $this->routeNameProvider = $routeNameProvider;

        parent::__construct($useVariant, $request);
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

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        return [
            Link::make(AddCommandInterface::NAME)
                ->href(route($this->routeNameProvider->getNew()))
                ->icon(AddCommandInterface::ICON)
        ];
    }
}
