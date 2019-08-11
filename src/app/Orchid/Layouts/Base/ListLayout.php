<?php

namespace App\Orchid\Layouts\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Product\Field\LabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

abstract class ListLayout extends Table
{
    /**
     * @var RouteNameProvider
     */
    private $routeNameProvider;

    public function __construct(RouteNameProviderInterface $routeNameProvider)
    {
        $this->routeNameProvider = $routeNameProvider;

        $this->data = $this->getDataKey();
    }

    abstract protected function getDataKey();

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),
            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),
            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getNameField($name, $label, $id)
    {
        return TD::set($name, $label)
            ->link(
                $this->getRouteNameEdit(),
                $id,
                $name
            );
    }

    protected function getRouteNameEdit()
    {
        return $this->routeNameProvider->getEdit();
    }
}
