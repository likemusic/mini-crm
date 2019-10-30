<?php

namespace App\Orchid\Screens\Base\Edit;

use App\Contract\Entity\Base\InfoMessageProviderInterface;
use App\Contract\Entity\Base\NamesProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Http\CodeInterface as HttpCodeInterface;
use App\Contract\Screen\Item\CommandBar\CreateInterface as SaveCommandInterface;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Orchid\Screens\Base\Can\CreateTrait as CanCreateTrait;
use App\Orchid\Screens\Base\EditScreen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Illuminate\Contracts\Container\Container as ContainerInterface;

abstract class CreateScreen extends EditScreen
{
    use CanCreateTrait;

//    public function __construct(
//        RouteNameProviderInterface
//        $routeRouteNameProviderInterface,
//        CrudUseVariantProviderInterface $useVariant,
//        InfoMessageProviderInterface $infoMessageProvider,
//        BreadcrumbsHelper $breadcrumbsHelper,
//        NamesProviderInterface $namesProvider,
//        ContainerInterface $container,
//        ?Request $request = null
//    ) {
//        $this->container = $container;
//        parent::__construct($routeRouteNameProviderInterface, $useVariant, $infoMessageProvider, $breadcrumbsHelper, $namesProvider, $request);
//    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = parent::commandBar();

        if ($this->canCreate()) {
            $buttons[] = $this->createCreateCommandBarButton();
        }

        return $buttons;
    }

    private function createCreateCommandBarButton()
    {
        return Button::make(SaveCommandInterface::NAME)
            ->icon(SaveCommandInterface::ICON)
            ->class(SaveCommandInterface::CLASS_NAME)
            ->method('create');
    }

    protected function getScreenName(): string
    {
        $genitiveName = $this->getGenitiveName();

        return $this->getBreadcrumbsCreateName($genitiveName);
    }

    protected function getBreadcrumbsCreateName(string $genitiveName): string
    {
        return $this->breadcrumbsHelper->getCreateName($genitiveName);
    }

    /**
     * @param Model $model
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function create(Request $request)
    {
        $this->checkCreatePermission();
        $message = $this->getCreateMessage();
        $model = $this->createModel();

        return $this->save($model, $request, $message);
    }

    private function createModel()
    {
        $modelClassName = $this->getModelClassName();

        return $this->createInstance($modelClassName);
    }

    private function createInstance(string $className)
    {
        return $this->container->make($className);
    }

    abstract protected function getModelClassName(): string;

    private function checkCreatePermission()
    {
        abort_if(!$this->canCreate(), HttpCodeInterface::FORBIDDEN);
    }

    private function getCreateMessage()
    {
        return $this->infoMessageProvider->getCreateMessage();
    }

    protected function getPermissionClassConstantName(): string
    {
        return PermissionConstantNameInterface::CREATE;
    }
}
