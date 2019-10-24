<?php

namespace App\Orchid\Layouts\DiscountedProduct;

use App\Contract\Entity\DiscountedProduct\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\DiscountedProduct\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\LabelInterface as ProductLabelInterface;
use App\Entity\DiscountedProduct\Route\NameProvider as RouteNameProvider;
use App\Model\DiscountedProduct;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class DiscountedProductListLayout extends ListLayout
{
    const DATA_KEY = 'discounted-products';

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
            $this->createIdField(FieldNameInterface::ID, FieldLabelInterface::ID),

            TD::set(FieldNameInterface::PRODUCT_ID, ProductLabelInterface::NAME)
                ->render(function (DiscountedProduct $discountedProduct) {
                    return $discountedProduct->product->name;
                }),

            TD::set(FieldNameInterface::NOTE, FieldLabelInterface::NOTE),
            TD::set(FieldNameInterface::CREATED_AT, FieldLabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, FieldLabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
