<?php

namespace App\Orchid\Layouts\DiscountedProduct;

use App\Contract\Entity\DiscountedProduct\Field\LabelInterface as DiscountedProductLabelInterface;
use App\Contract\Entity\DiscountedProduct\Field\NameInterface as DiscountedProductFieldNameInterface;
use App\Contract\Entity\Product\Field\LabelInterface as ProductLabelInterface;
use App\Entity\DiscountedProduct\Route\NameProvider as RouteNameProvider;
use App\Model\DiscountedProduct;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class DiscountedProductListLayout extends ListLayout
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
            TD::set(DiscountedProductFieldNameInterface::ID, DiscountedProductLabelInterface::ID)
                ->link($this->routeNameProvider->getEdit(), [DiscountedProductFieldNameInterface::ID], DiscountedProductFieldNameInterface::ID),

            TD::set(DiscountedProductFieldNameInterface::PRODUCT_ID, ProductLabelInterface::NAME)
                ->render(function (DiscountedProduct $discountedProduct) {
                    return $discountedProduct->product->name;
                }),

            TD::set(DiscountedProductFieldNameInterface::NOTE, DiscountedProductLabelInterface::NOTE),
            TD::set(DiscountedProductFieldNameInterface::CREATED_AT, DiscountedProductLabelInterface::CREATED_AT),
            TD::set(DiscountedProductFieldNameInterface::UPDATED_AT, DiscountedProductLabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return 'discounted-products';
    }
}
