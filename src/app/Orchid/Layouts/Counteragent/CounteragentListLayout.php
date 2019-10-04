<?php

namespace App\Orchid\Layouts\Counteragent;

use App\Contract\Entity\Counteragent\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Counteragent\Field\NameInterface as FieldNameInterface;
use App\Entity\Counteragent\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;
use Psr\Container\ContainerInterface;


class CounteragentListLayout extends ListLayout
{
    const DATA_KEY = 'counteragents';

    public function __construct(ContainerInterface $container, RouteNameProvider $routeNameProvider)
    {
        parent::__construct($container, $routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, FieldLabelInterface::NAME, FieldNameInterface::ID),

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
