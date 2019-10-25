<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Role;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Contract\Entity\Role\Route\NameInterface as RoleRouteNameInterface;
use App\Entity\Role\Route\NameProvider as RoleRouteNameProvider;

class RoleListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'roles';

    private $roleRouteNameProvider;

    public function __construct(RoleRouteNameProvider $roleRouteNameProvider)
    {
        $this->roleRouteNameProvider = $roleRouteNameProvider;
    }

    /**
     * @return array
     */
    public function columns() : array
    {
        return [
            TD::set('id', 'ID')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->sort()
                ->link($this->getEditRouteName(), 'slug'),

            TD::set('name', __('Name'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->link($this->getEditRouteName(), 'slug', 'name'),

            TD::set('slug', __('Slug'))
                ->filter(TD::FILTER_TEXT)
                ->sort(),

            TD::set('created_at', __('Created'))
                ->sort(),
        ];
    }

    private function getEditRouteName()
    {
        return $this->roleRouteNameProvider->getEdit();
    }
}
