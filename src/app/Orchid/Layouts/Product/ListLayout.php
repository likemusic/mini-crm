<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\NamesProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout as BaseListLayout;
use Orchid\Screen\TD;

class ListLayout extends BaseListLayout
{
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

    protected function getNotStandardColumns(): array
    {
        $editRouteName = $this->getRouteNameEdit();
        $routeIdFieldName = $this->getIdFieldName();

        return [
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, $routeIdFieldName),

            $this->createField(
                FieldNameInterface::CATEGORY . '.' . 'name',
                LabelInterface::CATEGORY,
                $editRouteName,
                $routeIdFieldName
            ),

            $this->createCurrencyField(
                FieldNameInterface::APPROXIMATE_PRICE,
                LabelInterface::APPROXIMATE_PRICE,
                $editRouteName,
                $routeIdFieldName
            ),

            $this->createCurrencyField(
                FieldNameInterface::SELLING_PRICE,
                LabelInterface::SELLING_PRICE,
                $editRouteName,
                $routeIdFieldName
            ),

            $this->createNoteField(
                FieldNameInterface::NOTE,
                LabelInterface::NOTE,
                $editRouteName,
                $routeIdFieldName
            )
        ];
    }

    protected function getIdFieldName(): string
    {
        return FieldNameInterface::ID;
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
