<?php

namespace App\Orchid\Layouts\Base;

use App\Contract\Entity\Base\Field\MetaInterface;
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

    abstract protected function getDataKey();

    protected function createNameField($name, $label, $id)
    {
        $routeName = $this->getRouteNameEdit();

        return $this->createField($name, $label, $routeName, $id);
    }

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getUpdate();
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
        return $this->routeNameProvider->getUpdate();
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
        $editLink = $this->createEditLink($routeName, $routeIdFieldName);

        return $editLink;
    }

    private function createEditLink($routeName, $routeIdFieldName)
    {
        return TD::set('Actions')->render(function ($item) use($routeName, $routeIdFieldName) {
            $url = route($routeName, $item->{$routeIdFieldName});

            return "<a href=\"{$url}\" class=\"btn\" >Edit</a> <a href=\"{$url}\" class=\"btn btn-danger\" >Delete</a>";
        });
    }
}
