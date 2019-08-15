<?php

namespace App\Orchid\Layouts\Order;

use App\Contract\Entity\Order\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\Route\NameProvider as OrderItemRouteNameProvider;
use App\Model\Order;
use App\Model\OrderItem;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class OrderListLayout extends ListLayout
{
    /**
     * @var OrderItemRouteNameProvider
     */
    private $orderItemRouteNameProvider;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        OrderItemRouteNameProvider $orderItemRouteNameProvider
    ) {
        $this->orderItemRouteNameProvider = $orderItemRouteNameProvider;

        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->getIdField(FieldNameInterface::ID, FieldLabelInterface::ID),

            TD::set(FieldNameInterface::ITEMS, FieldLabelInterface::ITEMS)
                ->render(function (Order $order) {
                    /** @var OrderItem[] $orderItems */
                    $orderItems = $order->items;

                    $orderItemsViews = [];

                    foreach ($orderItems as $orderItem) {
                        $orderItemsViews[] = $this->getOrderItemView($orderItem);
                    }

                    return implode(', ', $orderItemsViews);
                }),

            TD::set(FieldNameInterface::TOTAL_AMOUNT, FieldLabelInterface::TOTAL_AMOUNT),
            TD::set(FieldNameInterface::NOTE, FieldLabelInterface::NOTE),

            TD::set(FieldNameInterface::CREATED_AT, FieldLabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, FieldLabelInterface::UPDATED_AT),
        ];
    }

    private function getOrderItemView(OrderItem $orderItem)
    {
        $href = $this->getOrderItemEditUrl($orderItem);
        $title = $orderItem->id;

        return "<a href=\"{$href}\">{$title}</a>";
    }

    private function getOrderItemEditUrl(OrderItem $orderItem)
    {
        $orderItemEditRouteName = $this->getOrderItemEditRouteName();
        $orderItemId = $orderItem->id;

        return route($orderItemEditRouteName, $orderItemId);
    }

    private function getOrderItemEditRouteName()
    {
        return $this->orderItemRouteNameProvider->getEdit();
    }

    protected function getDataKey()
    {
        return 'orders';
    }
}
