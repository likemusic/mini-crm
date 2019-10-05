<?php

namespace App\Orchid\Layouts\Pharmacy;

use App\Contract\Entity\Pharmacy\Field\LabelInterface;
use App\Contract\Entity\Pharmacy\Field\NameInterface as FieldNameInterface;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class PharmacyListLayout extends ListLayout
{
    const DATA_KEY = 'pharmacy';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID),

            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::CATEGORY . '.' . 'name', LabelInterface::CATEGORY),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
