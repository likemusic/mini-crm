<?php

namespace App\Entity\Base\Layouts;

use App\Contract\Entity\Base\Field\MetaInterface;
use App\Contract\Entity\Base\NamesProviderInterface as NamesProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Screen\Table\Td\Action\NameInterface as ActionNameInterface;
use App\Contract\Screen\Table\Td\CurrencyInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\NotDbModel\ActionButton\DeleteButton;
use App\NotDbModel\ActionButton\EditButton;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Entity\Base\Screens\Can\CreateTrait as CanCreateTrait;
use App\Entity\Base\Screens\Can\DeleteTrait as CanDeleteTrait;
use App\Entity\Base\Screens\Can\UpdateTrait as CanUpdateTrait;
use App\Common\GetCurrentUserTrait;
use App\Common\GetPermissionClassConstantTrait;

abstract class ListLayout extends Table
{
    use GetPermissionClassConstantTrait;
    use GetCurrentUserTrait;
    use CanCreateTrait, CanDeleteTrait, CanUpdateTrait;

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

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $columns = [];

        $idFieldName = $this->getIdFieldName();
        $routeIdFieldName = $this->getRouteIdFieldName();

        if ($this->showIdField()) {
            $idFieldLabel = $this->getIdFieldLabel();
            $columns[] = $this->createIdField($idFieldName, $idFieldLabel, $routeIdFieldName);
        }

        $editRouteName = $this->getRouteNameEdit();

        $notStandardColumns = $this->getNotStandardColumns();
        $columns = array_merge($columns, $notStandardColumns);

        if ($this->showTimestampsFields()) {
            $namesClassName = $this->getFieldNamesClassName();
            $labelsClassName = $this->getFieldLabelsClassName();
            $timestampsColumns = $this->createTimestampsFields($namesClassName, $labelsClassName, $editRouteName, $routeIdFieldName);
            $columns = array_merge($columns, $timestampsColumns);
        }

        if ($this->showActionsField()) {
            $actionField = $this->createActionsField();
            $columns[] = $actionField;
        }

        return $columns;
    }

    abstract protected function getRouteIdFieldName(): string;

    abstract protected function showIdField(): bool;

    abstract protected function getIdFieldLabel(): string;

    protected function createIdField($idFieldName, $idFieldLabel, $routeIdFieldName = null)
    {
        if (!$routeIdFieldName) {
            $routeIdFieldName = $idFieldName;
        }

        $updateRouteName = $this->getUpdateRouteName();

        $field = $this->createField($idFieldName, $idFieldLabel, $updateRouteName, $routeIdFieldName);
        $field->align(TD::ALIGN_CENTER);

        return $field;
    }

    protected function getUpdateRouteName()
    {
        return $this->routeNameProvider->getEdit();
    }

    protected function createField($valueFieldName, $label, $routeName, $routeIdFieldName)
    {
        $field = $this->showFieldsAsLink()
            ? $this->createLinkField($valueFieldName, $label, $routeName, $routeIdFieldName)
            : $this->createTextField($valueFieldName, $label);

//        $this->applyFieldSortIfRequired($field, $valueFieldName);

        return $field;
    }

    protected function createNoteField(string $valueFieldName, string $label, string $routeName, string $routeIdFieldName)
    {
        return $this->createField($valueFieldName, $label, $routeName, $routeIdFieldName);
    }

    abstract protected function showFieldsAsLink(): bool;

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

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getEdit();
    }

    abstract protected function getNotStandardColumns(): array;

    abstract protected function showTimestampsFields(): bool;

    abstract protected function getFieldNamesClassName(): string;

    abstract protected function getFieldLabelsClassName(): string;

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

    abstract protected function showActionsField(): bool;

    protected function createActionsField()
    {
        $actionButtons = $this->getActionsButtons();
        $actionRoutes = [
            ActionNameInterface::EDIT => $this->getRouteNameEdit(),
            ActionNameInterface::DELETE => $this->getRouteNameDelete(),
        ];

        $routeIdFieldName = $this->getIdFieldName();

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

    protected function getActionsButtons()
    {
        $ret = [];

        if ($this->canUpdate()) {
            $ret[] = new EditButton();
        }

        if ($this->canDelete()) {
            $ret[] = new DeleteButton();
        }

        return $ret;
    }

    protected function getRouteNameDelete()
    {
        return $this->routeNameProvider->getDelete();
    }

    abstract protected function getIdFieldName(): string;

    protected function createNameField($name, $label, $id)
    {
        $routeName = $this->getRouteNameEdit();

        return $this->createField($name, $label, $routeName, $id);
    }

    protected function createCurrencyField(string $name, string $label, string $routeName, string $routeIdFieldName)
    {
        $priceWidth = CurrencyInterface::WIDTH;
        $align = CurrencyInterface::ALIGN;

        $field = $this->createField($name, $label, $routeName, $routeIdFieldName);
        $field->width($priceWidth)->align($align);

        return $field;
    }
}
