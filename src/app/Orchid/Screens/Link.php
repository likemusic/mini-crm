<?php

namespace App\Orchid\Screens;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Orchid\Screen\Link as BaseLink;
use Orchid\Screen\Repository;

/**
 * Class Link
 *
 * @method static Link class(string $class)
 */
class Link extends BaseLink
{
    /**
     * @var string
     */
    public $class = '';

    /**
     * @param Repository $query
     *
     * @return Factory|View|mixed|void
     */
    public function build(Repository $query)
    {
        if (! $this->isSee()) {
            return;
        }

        if (! is_null($this->view)) {
            return view($this->view, $query->all());
        }

        return view('layouts.link', [
            'name'      => $this->name,
            'method'    => $this->method,
            'icon'      => $this->icon,
            'modal'     => $this->modal,
            'title'     => $this->title,
            'link'      => $this->link,
            'group'     => $this->group,
            'confirm'   => $this->confirm,
            'action'    => $this->action(),
            'query'     => $query,
            'class' => $this->class,
        ]);
    }

}
