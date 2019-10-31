<?php

namespace App\Orchid\Layouts\Currency;

use App\Contract\Entity\Currency\Field\LabelInterface;
use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use App\Entity\Currency\NamesProvider;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout as BaseListLayout;
use App\Orchid\Screens\Currency\PermissionsClassNameTrait;
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

    protected function getIdFieldLabel(): string
    {
        return LabelInterface::ID;
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
        return FieldNameInterface::ID;
    }

    protected function getNotStandardColumns(): array
    {
        $editRouteName = $this->getRouteNameEdit();
        $routeIdFieldName = $this->getIdFieldName();

        return [
            TD::set(FieldNameInterface::CODE, LabelInterface::CODE),
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::SORT_ORDER, LabelInterface::SORT_ORDER),
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
        return true;
    }

    protected function showActionsField(): bool
    {
        return true;
    }
}
