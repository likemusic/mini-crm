<?php

namespace App\Orchid\Layouts\ProductCategory;

use App\Contract\Entity\ProductCategory\Field\LabelInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as FieldNameInterface;
use App\Entity\ProductCategory\NamesProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout as BaseListLayout;
use Orchid\Screen\TD;
use App\Orchid\Screens\ProductCategory\PermissionsClassNameTrait;

class ListLayout extends BaseListLayout
{
    use PermissionsClassNameTrait;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        NamesProvider $namesProvider
    )
    {
        parent::__construct($routeNameProvider, $namesProvider);
    }

    /**
     * @return TD[]
     */
    public function getNotStandardColumns(): array
    {
        $editRouteName = $this->getRouteNameEdit();
        $routeIdFieldName = $this->getIdFieldName();

        return [
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            $this->createNoteField(
                FieldNameInterface::NOTE,
                LabelInterface::NOTE,
                $editRouteName,
                $routeIdFieldName
            )
        ];
    }

    protected function getRouteIdFieldName(): string
    {
        return FieldNameInterface::ID;
    }

    protected function showIdField(): bool
    {
        return true;
    }

    protected function getIdFieldLabel(): string
    {
        return FieldNameInterface::ID;
    }

    protected function showFieldsAsLink(): bool
    {
        return true;
    }

    protected function showTimestampsFields(): bool
    {
        return true;
    }

    protected function getFieldNamesClassName(): string
    {
        return FieldNameInterface::class;
    }

    protected function getFieldLabelsClassName(): string
    {
        return LabelInterface::class;
    }

    protected function showActionsField(): bool
    {
        return true;
    }

    protected function getIdFieldName(): string
    {
        return FieldNameInterface::ID;
    }
}
