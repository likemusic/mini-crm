<?php

namespace App\Orchid\Layouts\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

abstract class ListLayout extends Table
{
    /**
     * @var RouteNameProvider
     */
    protected $routeNameProvider;

    public function __construct(RouteNameProviderInterface $routeNameProvider)
    {
        $this->routeNameProvider = $routeNameProvider;
        $this->target = $this->getDataKey();
    }

    abstract protected function getDataKey();

    protected function getNameField($name, $label, $id)
    {
        $routeName = $this->getRouteNameEdit();

        return $this->getLinkField($name, $label, $routeName, $id);
    }

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getEdit();
    }

    protected function getLinkField($name, $label, $routeName, $id)
    {
        return TD::set($name, $label)
            ->link(
                $routeName,
                $id,
                $name
            );
    }

    protected function getIdField($idFieldName, $idFieldLabel)
    {
        $editRouteName = $this->routeNameProvider->getEdit();

        return $this->getLinkField($idFieldName, $idFieldLabel, $editRouteName, $idFieldName);
    }
}
