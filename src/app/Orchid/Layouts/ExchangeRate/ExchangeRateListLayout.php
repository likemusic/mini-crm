<?php

namespace App\Orchid\Layouts\ExchangeRate;

use App\Contract\Entity\ExchangeRate\Field\LabelInterface;
use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class ExchangeRateListLayout extends ListLayout
{
    const DATA_KEY = 'exchange-rates';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        $editRouteName = $this->routeNameProvider->getEdit();

        return [
            $this->getLinkField(
                FieldNameInterface::FROM_CURRENCY_CODE,
                LabelInterface::FROM_CURRENCY_CODE,
                $editRouteName,
                FieldNameInterface::ID
            ),

            $this->getLinkField(
                FieldNameInterface::TO_CURRENCY_CODE,
                LabelInterface::TO_CURRENCY_CODE,
                $editRouteName,
                FieldNameInterface::ID
            ),

            $this->getLinkField(
                FieldNameInterface::RATE,
                LabelInterface::RATE,
                $editRouteName,
                FieldNameInterface::ID
            ),

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
