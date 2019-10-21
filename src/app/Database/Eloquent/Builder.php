<?php


namespace App\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;
use Illuminate\Database\Eloquent\Model;

class Builder extends BaseBuilder
{
    /**
     * Set a model instance for the model being queried.
     *
     * @param Model $model
     * @param string $alias
     * @return $this
     */
    public function setModelWithTableAlias(Model $model, string $alias)
    {
        $this->model = $model;

        $this->query->from($model->getTable());

        return $this;
    }
}
