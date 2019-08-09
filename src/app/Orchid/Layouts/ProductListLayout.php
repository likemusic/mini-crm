<?php

namespace App\Orchid\Layouts;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Product\Route\NameInterface as ProductRouteNamesInterface;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $data = 'products';

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            TD::set(ProductFieldNameInterface::NAME, LabelInterface::NAME)
                ->link(
                    ProductRouteNamesInterface::EDIT,
                    ProductFieldNameInterface::ID,
                    ProductFieldNameInterface::NAME
                ),

            TD::set(ProductFieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(ProductFieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),
            TD::set(ProductFieldNameInterface::NOTE, LabelInterface::NOTE),
            TD::set(ProductFieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(ProductFieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }
}
