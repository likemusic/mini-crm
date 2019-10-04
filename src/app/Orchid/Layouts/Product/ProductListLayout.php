<?php

namespace App\Orchid\Layouts\Product;

use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;
use Psr\Container\ContainerInterface;

class ProductListLayout extends ListLayout
{
    const DATA_KEY = 'products';

    public function __construct(ContainerInterface $container, RouteNameProvider $routeNameProvider)
    {
        parent::__construct($container, $routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::CATEGORY_ID, LabelInterface::CATEGORY),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),

            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),

            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
