<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\NamesProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\NotDbModel\ActionButton\DeleteButton;
use App\NotDbModel\ActionButton\EditButton;
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

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $columns = [];

        $routeIdFieldName = $this->getRouteIdFieldName();

        if ($this->showIdField()) {
            $columns[] = $this->createIdField(FieldNameInterface::ID, LabelInterface::ID);
        }

        $editRouteName = $this->getRouteNameEdit();

        $mergedColumns = [
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

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),
        ];

        $columns = array_merge($columns, $mergedColumns);

        if ($this->showTimestampsFields()) {
            $timestampsColumns = $this->createTimestampsFields(FieldNameInterface::class, LabelInterface::class, $editRouteName, FieldNameInterface::ID);
            $columns = array_merge($columns, $timestampsColumns);
        }

        if ($this->showActionsField()) {
            $actionField = $this->createActionsField();
            $columns[] = $actionField;
        }

        return $columns;
    }

    protected function getRouteIdFieldName(): string
    {
        return FieldNameInterface::ID;
    }


    protected function showIdField(): bool
    {
        return true;
    }

    protected function showFieldsAsLink()
    {
        return true;
    }

    protected function getActionsButtons()
    {
        return [
            new EditButton(),
            new DeleteButton(),
        ];
    }
}
