<?php

namespace App\Orchid\Layouts\ProductQuote;

use App\Contract\Entity\ProductQuote\Field\LabelInterface;
use App\Contract\Entity\ProductQuote\Field\LabelInterface as ProductLabelInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;
use App\Model\ProductQuote;

class ProductQuoteListLayout extends ListLayout
{
    /**
     * @var ProductRouteNameProvider
     */
    private $productRouteNameProvider;

    public function __construct(RouteNameProvider $routeNameProvider, ProductRouteNameProvider $productRouteNameProvider)
    {
        $this->productRouteNameProvider = $productRouteNameProvider;
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID)
                ->link($this->routeNameProvider->getEdit(), [FieldNameInterface::ID], FieldNameInterface::ID),

            TD::set(FieldNameInterface::PRODUCT_ID, LabelInterface::PRODUCT_ID)->link($this->productRouteNameProvider->getEdit(), ProductFieldNameInterface::ID, ProductFieldNameInterface::ID),

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
        return 'product_quotes';
    }
}
