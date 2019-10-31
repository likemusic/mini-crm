<?php

declare(strict_types=1);

namespace App\Entity\Role\Layouts;

use App\Contract\Entity\Role\Field\LabelInterface;
use App\Contract\Entity\Role\Field\NameInterface as FieldNameInterface;
use App\Entity\Role\NamesProvider;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout as BaseListLayout;
use App\Orchid\Screens\Role\PermissionsClassNameTrait;
use Orchid\Screen\TD;

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

    protected function getIdFieldName(): string
    {
        return FieldNameInterface::ID;
    }

    protected function getIdFieldLabel(): string
    {
        return LabelInterface::ID;
    }

    protected function getNotStandardColumns(): array
    {
        $routeIdFieldName = $this->getRouteIdFieldName();
        $editRouteName = $this->getRouteNameEdit();

        return [
            $this->createField(
                FieldNameInterface::NAME,
                __(LabelInterface::NAME),
                $editRouteName,
                $routeIdFieldName)
                ->sort()
                ->filter(TD::FILTER_TEXT),

            $this->createField(
                FieldNameInterface::SLUG,
                __(LabelInterface::SLUG),
                $editRouteName,
                $routeIdFieldName
            )
                ->sort()
                ->filter(TD::FILTER_TEXT),

            $this->createField(
                FieldNameInterface::CREATED_AT,
                __(LabelInterface::CREATED_AT),
                $editRouteName,
                $routeIdFieldName
            )
                ->sort(),
        ];
    }

    protected function getRouteIdFieldName(): string
    {
        return FieldNameInterface::SLUG;
    }

    protected function showIdField(): bool
    {
        return true;
    }

    protected function showFieldsAsLink(): bool
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

    protected function getFieldNamesClassName(): string
    {
        return FieldNameInterface::class;
    }

    protected function getFieldLabelsClassName(): string
    {
        return LabelInterface::class;
    }
}
