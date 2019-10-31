<?php

namespace App\Orchid\Layouts\ProductQuote;

use App\Contract\Entity\ProductQuote\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\ProductQuote\Field\LabelInterface as ProductLabelInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Base\Layouts\ListLayout;
use Orchid\Screen\TD;
use App\Model\ProductQuote;

class ProductQuoteListLayout extends ListLayout
{
    const DATA_KEY = 'product_quotes';

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
            $this->createIdField(FieldNameInterface::ID, FieldLabelInterface::ID),

            TD::set(FieldNameInterface::PRODUCT_ID, FieldLabelInterface::PRODUCT_ID)
                ->link(
                    $this->productRouteNameProvider->getEdit(),
                    FieldNameInterface::PRODUCT_ID,
                    FieldNameInterface::PRODUCT_ID
                ),

            $this->createNameField(FieldNameInterface::NAME, FieldLabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, FieldLabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, FieldLabelInterface::SELLING_PRICE),

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
