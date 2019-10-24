<?php

namespace App\Orchid\Layouts\OrderItem;

use App\Contract\Entity\OrderItem\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Order\Field\NameInterface as OrderFieldNameInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as ProductQuoteFieldNameInterface;
use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\Route\NameProvider as ProductQuoteRouteNameProvider;
use App\Entity\Order\Route\NameProvider as OrderRouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class OrderItemListLayout extends ListLayout
{
    const DATA_KEY = 'order-items';

    /**
     * @var ProductQuoteRouteNameProvider
     */
    private $productQuoteRouteNameProvider;

    /**
     * @var OrderRouteNameProvider
     */
    private $orderRouteNameProvider;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        ProductQuoteRouteNameProvider $productQuoteRouteNameProvider,
        OrderRouteNameProvider $orderRouteNameProvider
    ) {
        $this->productQuoteRouteNameProvider = $productQuoteRouteNameProvider;
        $this->orderRouteNameProvider = $orderRouteNameProvider;

        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->createIdField(FieldNameInterface::ID, FieldLabelInterface::ID),

            $this->createLinkField(
                FieldNameInterface::ORDER_ID,
                FieldLabelInterface::ORDER_ID,
                $this->orderRouteNameProvider->getUpdate(),
                OrderFieldNameInterface::ID
            ),

            $this->createLinkField(
                FieldNameInterface::PRODUCT_QUOTE_ID,
                FieldLabelInterface::PRODUCT_QUOTE_ID,
                $this->productQuoteRouteNameProvider->getUpdate(),
                ProductQuoteFieldNameInterface::ID
            ),

            TD::set(FieldNameInterface::SELLING_PRICE, FieldLabelInterface::SELLING_PRICE),
            TD::set(FieldNameInterface::COUNT, FieldLabelInterface::COUNT),
            TD::set(FieldNameInterface::AMOUNT, FieldLabelInterface::AMOUNT),

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
