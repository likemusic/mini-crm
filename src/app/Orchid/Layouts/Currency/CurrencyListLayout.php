<?php

namespace App\Orchid\Layouts\Currency;

use App\Contract\Entity\Currency\Field\LabelInterface;
use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class CurrencyListLayout extends ListLayout
{
    const DATA_KEY = 'currencies';

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

            TD::set(FieldNameInterface::CODE, LabelInterface::CODE),
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::SORT_ORDER, LabelInterface::SORT_ORDER),

            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
