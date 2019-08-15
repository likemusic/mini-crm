<?php

namespace App\Orchid\Layouts\UnaccountedProduct;

use App\Contract\Entity\UnaccountedProduct\Field\LabelInterface;
use App\Contract\Entity\UnaccountedProduct\Field\NameInterface as FieldNameInterface;
use App\Entity\UnaccountedProduct\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class UnaccountedProductListLayout extends ListLayout
{
    const DATA_KEY = 'unaccounted-products';

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
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

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
