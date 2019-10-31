<?php

namespace App\Entity\Counteragent\Layouts;

use App\Contract\Entity\Counteragent\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Counteragent\Field\NameInterface as FieldNameInterface;
use App\Entity\Counteragent\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout;
use Orchid\Screen\TD;

class CounteragentListLayout extends ListLayout
{
    const DATA_KEY = 'counteragents';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            $this->createNameField(FieldNameInterface::NAME, FieldLabelInterface::NAME, FieldNameInterface::ID),

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
