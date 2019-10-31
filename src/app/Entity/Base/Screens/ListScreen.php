<?php

namespace App\Entity\Base\Screens;

use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as  ListUseVariantProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Screen\Table\CommandBar\AddInterface as AddCommandInterface;
use App\Orchid\Screens\Base;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Entity\Base\NamesProviderInterface;
use App\Entity\Base\Screens\Can\CreateTrait as CanCreateTrait;
use App\Common\GetCurrentUserTrait;

abstract class ListScreen extends Base
{
    use GetCurrentUserTrait;
    use CanCreateTrait;

    /**
     * @var ListUseVariantProviderInterface
     */
    protected $useVariant;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    /**
     * @var NamesProviderInterface
     */
    protected $namesProvider;

    public function __construct(
        ListUseVariantProviderInterface $useVariant,
        RouteNameProviderInterface $routeNameProvider,
        NamesProviderInterface $namesProvider,
        ?Request $request = null)
    {
        $this->name = $useVariant->getListName();
        $this->useVariant = $useVariant;
        $this->routeNameProvider = $routeNameProvider;
        $this->namesProvider = $namesProvider;

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
            ->icon(AddCommandInterface::ICON)
            ->class(AddCommandInterface::CLASS_ATTRIBUTE)
            ;
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
