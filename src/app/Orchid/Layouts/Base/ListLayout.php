<?php

namespace App\Orchid\Layouts\Base;

use App\Contract\Entity\Base\Field\MetaInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Contract\Entity\Base\NamesProviderInterface as NamesProviderInterface;


abstract class ListLayout extends Table
{
    /**
     * @var RouteNameProvider
     */
    protected $routeNameProvider;

    /**
     * @var NamesProviderInterface
     */
    protected $namesProvider;

    public function __construct(RouteNameProviderInterface $routeNameProvider, NamesProviderInterface $namesProvider)
    {
        $this->routeNameProvider = $routeNameProvider;
        $this->namesProvider = $namesProvider;

        $this->target = $this->getDataKey();
    }

    protected function showIdField(): bool
    {
        return true;
    }

    protected function showFieldsAsLink()
    {
        return true;
    }

    protected function showTimestampsFields()
    {
        return true;
    }

    protected function showActionsField()
    {
        return true;
    }

    protected function getDataKey()
    {
        return $this->namesProvider->getListDataKey();
    }

    protected function createNameField($name, $label, $id)
    {
        $routeName = $this->getRouteNameEdit();

        return $this->createField($name, $label, $routeName, $id);
    }

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getEdit();
    }

    protected function getRouteNameDelete()
    {
        return $this->routeNameProvider->getDelete();
    }

    protected function createLinkField($name, $label, $routeName, $id)
    {
        return TD::set($name, $label)
            ->link(
                $routeName,
                $id,
                $name
            );
    }

    protected function createIdField($idFieldName, $idFieldLabel)
    {
        $updateRouteName = $this->getUpdateRouteName();

        return $this->createField($idFieldName, $idFieldLabel, $updateRouteName, $idFieldName);
    }

    protected function getUpdateRouteName()
    {
        return $this->routeNameProvider->getEdit();
    }

    protected function createField($valueFieldName, $label, $routeName, $routeIdFieldName)
    {
        return $this->showFieldsAsLink()
            ? $this->createLinkField($valueFieldName, $label, $routeName, $routeIdFieldName)
            : $this->createTextField($valueFieldName, $label);
    }

    protected function createTextField($valueFieldName, $label)
    {
        return TD::set($valueFieldName, $label);
    }

    protected function createTimestampsFields(string $nameClassName, string $labelClassName, string $routeName, string $routeIdFieldName)
    {
        $createdAtField = $this->createCreatedAtField($nameClassName, $labelClassName, $routeName, $routeIdFieldName);
        $updatedAtField = $this->createUpdatedAtField($nameClassName, $labelClassName, $routeName, $routeIdFieldName);

        return [$createdAtField, $updatedAtField];
    }

    protected function createCreatedAtField(string $nameClassName, string $labelClassName, string $routeName, string $routeIdFieldName)
    {
        $valueFieldName = $this->getCreatedAtConstantValue($nameClassName);
        $label = $this->getCreatedAtConstantValue($labelClassName);

        return $this->createDateField($valueFieldName, $label, $routeName, $routeIdFieldName);
    }

    protected function createUpdatedAtField(string $nameClassName, string $labelClassName, string $routeName, string $routeIdFieldName)
    {
        $valueFieldName = $this->getUpdatedAtConstantValue($nameClassName);
        $label = $this->getUpdatedAtConstantValue($labelClassName);

        return $this->createDateField($valueFieldName, $label, $routeName, $routeIdFieldName);
    }

    protected function getCreatedAtConstantValue($className)
    {
        $constantName = MetaInterface::CREATED_AT;

        return $this->getClassConstantValue($className, $constantName);
    }

    protected function getUpdatedAtConstantValue($className)
    {
        $constantName = MetaInterface::UPDATED_AT;

        return $this->getClassConstantValue($className, $constantName);
    }

    protected function getClassConstantValue($className, $constantName)
    {
        return constant("{$className}::{$constantName}");
    }

    protected function createDateField(string $valueFieldName, string $label, string $routeName, string $routeIdFieldName)
    {
        return $this->createField($valueFieldName, $label, $routeName, $routeIdFieldName);
    }

    protected function createActionsField(string $routeName, string $routeIdFieldName)
    {
        $actionsRoutes = $this->getActionsRoutes();

        return TD::set('Actions')->render(function ($item) use($actionsRoutes, $routeIdFieldName) {

            $id = $item->{$routeIdFieldName};
            $actionButtonsHtml = [];
            foreach ($actionsRoutes as $actionText => $actionRouteName) {
                $actionButtonsHtml[] = $this->createLink($actionRouteName, $id, $actionText, 'btn btn-default');
            }

            return implode(' ',$actionButtonsHtml);
        });
    }

    abstract protected function getActionsRoutes();

    private function createEditLink($routeName, $routeIdFieldName)
    {
        return $this->createLink($routeName, $routeIdFieldName, 'Edit');
    }

    private function createLink(string $routeName, $routeParams, string $text, $class = null)
    {
        return view('html-element.a', [
            'route'      => $routeName,
            'attributes' => $routeParams,
            'text'       => $text,
            'class' => $class,
        ])->render();
    }
}
