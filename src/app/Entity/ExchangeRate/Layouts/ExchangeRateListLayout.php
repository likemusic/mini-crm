<?php

namespace App\Entity\ExchangeRate\Layouts;

use App\Contract\Entity\ExchangeRate\Field\LabelInterface;
use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Currency\Field\NameInterface as CurrencyFieldNameInterface;
use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout;
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
    public function columns(): array
    {
        $editRouteName = $this->routeNameProvider->getEdit();

        return [
//            TD::set(FieldNameInterface::FROM_CURRENCY . '.' . CurrencyFieldNameInterface::CODE, LabelInterface::FROM_CURRENCY_CODE),
            $this->createLinkField(
                FieldNameInterface::FROM_CURRENCY . '.' . CurrencyFieldNameInterface::CODE,
                LabelInterface::FROM_CURRENCY_CODE,
                $editRouteName,
                FieldNameInterface::ID
            ),

            $this->createLinkField(
                FieldNameInterface::TO_CURRENCY . '.' . CurrencyFieldNameInterface::CODE,
                LabelInterface::TO_CURRENCY_CODE,
                $editRouteName,
                FieldNameInterface::ID
            ),

            $this->createLinkField(
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