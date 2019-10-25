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

        $priceWidth = '7em';
        $mergedColumns = [
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            $this->createField(FieldNameInterface::CATEGORY . '.' . 'name', LabelInterface::CATEGORY, $editRouteName, FieldNameInterface::ID),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE)->width($priceWidth),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE)->width($priceWidth),

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),
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

    protected function showIdField(): bool
    {
        return true;
    }

    protected function showFieldsAsLink()
    {
        return true;
    }

    protected function getActionsRoutes()
    {
        return [
            'Edit' => $this->getRouteNameEdit(),
            'Delete' => $this->getRouteNameDelete(),
        ];
    }
}
