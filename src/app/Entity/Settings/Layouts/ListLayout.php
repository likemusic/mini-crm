<?php

namespace App\Entity\Settings\Layouts;

use App\Contract\Entity\Settings\Field\LabelInterface;
use App\Contract\Entity\Settings\Field\NameInterface as FieldNameInterface;
use App\Entity\Settings\NamesProvider;
use App\Entity\Settings\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout as BaseListLayout;
use App\Entity\Settings\Screens\PermissionsClassNameTrait;

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

    protected function getIdFieldLabel(): string
    {
        return LabelInterface::KEY;
    }

    protected function getFieldNamesClassName(): string
    {
        return FieldNameInterface::class;
    }

    protected function getFieldLabelsClassName(): string
    {
        return LabelInterface::class;
    }

    protected function getRouteIdFieldName(): string
    {
        return $this->getIdFieldName();
    }

    protected function getIdFieldName(): string
    {
        return FieldNameInterface::KEY;
    }

    protected function getNotStandardColumns(): array
    {
        $editRouteName = $this->getRouteNameEdit();
        $routeIdFieldName = $this->getIdFieldName();

        return [
            $this->createField(
                FieldNameInterface::VALUE,
                LabelInterface::VALUE,
                $editRouteName,
                $routeIdFieldName
            ),

//            $this->createNoteField(
//                FieldNameInterface::NOTE,
//                LabelInterface::NOTE,
//                $editRouteName,
//                $routeIdFieldName
//            )
        ];
    }

    protected function showFieldsAsLink(): bool
    {
        return true;
    }

    protected function showIdField(): bool
    {
        return true;
    }

    protected function showTimestampsFields(): bool
    {
        return false;
    }

    protected function showActionsField(): bool
    {
        return true;
    }
}
