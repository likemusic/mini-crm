<?php

namespace App\Model;

use App\Contract\Entity\Role\Field\NameInterface;
use Orchid\Platform\Models\Role as BaseRole;

class Role extends BaseRole
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return NameInterface::SLUG;
    }
}
