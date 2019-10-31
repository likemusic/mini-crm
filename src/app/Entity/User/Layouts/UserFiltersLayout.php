<?php

namespace App\Entity\User\Layouts;

use Orchid\Filters\Filter;
use App\Orchid\Filters\RoleFilter;
use Orchid\Screen\Layouts\Selection;

class UserFiltersLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): array
    {
        return [
            RoleFilter::class,
        ];
    }
}
