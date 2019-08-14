<?php

namespace App\Orchid\Layouts\OrderItem;

use App\Contract\Entity\OrderItem\Field\LabelInterface;
use App\Contract\Entity\ProductQuote\Field\LabelInterface as ProductQuoteLabelInterface;
use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\Route\NameProvider as ProductQuoteRouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class OrderItemListLayout extends ListLayout
{
    /**
     * @var ProductQuoteRouteNameProvider
     */
    private $productQuoteRouteNameProvider;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        ProductQuoteRouteNameProvider $productQuoteRouteNameProvider
    ) {
        $this->productQuoteRouteNameProvider = $productQuoteRouteNameProvider;
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID)
                ->link($this->routeNameProvider->getEdit(), FieldNameInterface::ID, FieldNameInterface::ID),

            TD::set(FieldNameInterface::PRODUCT_QUOTE_ID, LabelInterface::PRODUCT_QUOTE_ID)
                ->link($this->productQuoteRouteNameProvider->getEdit(), FieldNameInterface::ID, FieldNameInterface::ID),


            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),
            TD::set(FieldNameInterface::COUNT, LabelInterface::COUNT),
            TD::set(FieldNameInterface::AMOUNT, LabelInterface::AMOUNT),

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),

            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return 'order-items';
    }
}
