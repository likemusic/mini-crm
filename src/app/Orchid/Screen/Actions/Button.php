<?php

namespace App\Orchid\Screen\Actions;

use Orchid\Screen\Actions\Button as BaseButton;

class Button extends BaseButton
{
    /**
     * Create instance of the button.
     *
     * @param string $name
     *
     * @return Button $name
     */
    public static function make(string $name = ''): BaseButton
    {
        return (new static())
            ->name($name)
            ->addBeforeRender(function () use ($name) {
                $url = url()->current();
                $query = http_build_query($this->get('parameters'));

//                $action = "{$url}/{$this->get('method')}?{$query}";
//                $this->set('action', $action);
                $this->set('name', $name);
            });
    }
}
