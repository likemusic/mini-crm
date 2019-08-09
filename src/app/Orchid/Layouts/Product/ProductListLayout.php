<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductListLayout extends Table
{
    private $productRouteNameProvider;

    public function __construct(ProductRouteNameProvider $productRouteNameProvider)
    {
        $this->productRouteNameProvider = $productRouteNameProvider;
    }

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
                    $this->productRouteNameProvider->getEdit(),
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
