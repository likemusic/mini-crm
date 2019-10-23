<?php

namespace App\Orchid\Screens\Base;

use App\Contract\Entity\Base\NotEditableUseVariantProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Screen\Table\CommandBar\AddInterface as AddCommandInterface;
use App\Orchid\Screens\Base;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

abstract class ListScreen extends Base
{
    use CanCreateTrait;

    /**
     * @var NotEditableUseVariantProviderInterface
     */
    protected $useVariant;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    public function __construct(
        NotEditableUseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        ?Request $request = null)
    {
        $this->name = $useVariant->getListName();
        $this->useVariant = $useVariant;
        $this->routeNameProvider = $routeNameProvider;

        parent::__construct($request);
    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = [];

        if ($this->canCreate()) {
            $buttons[] = $this->createAddCommandBarButton();
        }

        return $buttons;
    }

    private function createAddCommandBarButton()
    {
        return Link::make(AddCommandInterface::NAME)
            ->href(route($this->routeNameProvider->getCreate()))
            ->icon(AddCommandInterface::ICON);
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
    abstract protected function getData();

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

    protected function getPermissionClassConstantName(): string
    {
        return PermissionConstantNameInterface::LIST;
    }

}
