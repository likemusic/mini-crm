<?php

namespace App\Common\Page\Element\Screen\Table\Column\Actions\ActionButton;

use App\Contract\Screen\Table\Td\Action\IconInterface;
use App\Contract\Screen\Table\Td\Action\LabelInterface;
use App\Contract\Screen\Table\Td\Action\NameInterface;
use App\Contract\Screen\Table\Td\Action\StyleInterface;
use App\Common\Page\Element\Screen\Table\Column\Actions\ActionButton;

class EditButton extends ActionButton
{
    public function __construct(
        string $name = NameInterface::EDIT,
        string $icon = IconInterface::EDIT,
        string $label = LabelInterface::EDIT,
        string $style = StyleInterface::EDIT
    )
    {
        parent::__construct($name, $label, $icon, $style);
    }
}