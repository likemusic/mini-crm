<?php

namespace App\NotDbModel\ActionButton;

use App\Contract\Http\MethodInterface as HttpMethodInterface;
use App\Contract\Screen\Table\Td\Action\IconInterface;
use App\Contract\Screen\Table\Td\Action\LabelInterface;
use App\Contract\Screen\Table\Td\Action\NameInterface;
use App\Contract\Screen\Table\Td\Action\StyleInterface;
use App\NotDbModel\ActionButton;

class DeleteButton extends ActionButton
{
    public function __construct(
        string $name = NameInterface::DELETE,
        string $icon = IconInterface::DELETE,
        string $label = LabelInterface::DELETE,
        string $style = StyleInterface::DELETE,
        string $method = HttpMethodInterface::POST,
        string $onclick = 'return onDelete();'
    )
    {
        parent::__construct($name, $label, $icon, $style, $method, $onclick);
    }
}
