<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class ProductListLayout extends ListLayout
{
    const DATA_KEY = 'products';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    protected function showIdField(): bool
    {
        return true;
    }

    protected function showFieldsAsLink()
    {
        return true;
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $columns = [];

        if ($this->showIdField()) {
            $columns[] = $this->createIdField(FieldNameInterface::ID, LabelInterface::ID);
        }

        $editRouteName = $this->getRouteNameEdit();

        $mergedColumns = [
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            $this->createField(FieldNameInterface::CATEGORY . '.' . 'name', LabelInterface::CATEGORY, $editRouteName, FieldNameInterface::ID),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),

//            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
//            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];

        $columns = array_merge($columns, $mergedColumns);

        if ($this->showTimestampsFields()) {
            $timestampsColumns = $this->createTimestampsFields(FieldNameInterface::class, LabelInterface::class, $editRouteName, FieldNameInterface::ID);
            $columns = array_merge($columns, $timestampsColumns);
        }

        if ($this->showActionsField()) {
            $actionField = $this->createActionsField($editRouteName, FieldNameInterface::ID);
            $columns[] = $actionField;
        }

        return $columns;
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
