<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class ProductListLayout extends ListLayout
{
    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),

            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return 'products';
    }
}
