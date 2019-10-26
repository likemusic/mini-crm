<?php

namespace App\Orchid\Layouts\Base;

use App\Contract\Entity\Base\Field\MetaInterface;
use App\Contract\Entity\Base\NamesProviderInterface as NamesProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Screen\Table\Td\Action\NameInterface as ActionNameInterface;
use App\Contract\Screen\Table\Td\CurrencyInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

//use Orchid\Screen\Actions\Button;
//use App\Orchid\Screen\Actions\Button;

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

    protected function getDataKey()
    {
        return $this->namesProvider->getListDataKey();
    }

    protected function showIdField(): bool
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

    protected function createNameField($name, $label, $id)
    {
        $routeName = $this->getRouteNameEdit();

        return $this->createField($name, $label, $routeName, $id);
    }

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getEdit();
    }

    protected function createField($valueFieldName, $label, $routeName, $routeIdFieldName)
    {
        return $this->showFieldsAsLink()
            ? $this->createLinkField($valueFieldName, $label, $routeName, $routeIdFieldName)
            : $this->createTextField($valueFieldName, $label);
    }

    protected function showFieldsAsLink()
    {
        return true;
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

    protected function createTextField($valueFieldName, $label)
    {
        return TD::set($valueFieldName, $label);
    }

    protected function createCurrencyField(string $name, string $label, string $routeName, string $routeIdFieldName)
    {
        $priceWidth = CurrencyInterface::WIDTH;
        $align = CurrencyInterface::ALIGN;

        $field = $this->createField($name, $label, $routeName, $routeIdFieldName);
        $field->width($priceWidth)->align($align);

        return $field;
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

    protected function getCreatedAtConstantValue($className)
    {
        $constantName = MetaInterface::CREATED_AT;

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

    protected function createUpdatedAtField(string $nameClassName, string $labelClassName, string $routeName, string $routeIdFieldName)
    {
        $valueFieldName = $this->getUpdatedAtConstantValue($nameClassName);
        $label = $this->getUpdatedAtConstantValue($labelClassName);

        return $this->createDateField($valueFieldName, $label, $routeName, $routeIdFieldName);
    }

    protected function getUpdatedAtConstantValue($className)
    {
        $constantName = MetaInterface::UPDATED_AT;

        return $this->getClassConstantValue($className, $constantName);
    }

    protected function createActionsField()
    {
        $actionButtons = $this->getActionsButtons();
        $actionRoutes = [
            ActionNameInterface::EDIT => $this->getRouteNameEdit(),
            ActionNameInterface::DELETE => $this->getRouteNameDelete(),
        ];

        $routeIdFieldName = $this->getRouteIdFieldName();

        return TD::set('Действия')->render(function ($item) use ($actionButtons, $actionRoutes, $routeIdFieldName) {
            $id = $item->{$routeIdFieldName};
            $vars = [
                'routes' => $actionRoutes,
                'id' => $id,
                'actionButtons' => $actionButtons,
            ];

            return view('layouts.actions', $vars);
        });
    }

    abstract protected function getActionsButtons();

    protected function getRouteNameDelete()
    {
        return $this->routeNameProvider->getDelete();
    }

    abstract protected function getRouteIdFieldName(): string;
}
