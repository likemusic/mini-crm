<?php

namespace App\Common\Page\Element\Screen\Form\Field\RelationWithData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Assert;

class Field extends Relation
{
    /**
     * @var string
     */
    protected $view = 'fields.relation_with_data';

    /**
     * @param string|Model $model
     * @param string $name
     * @param string|null $key
     *
     * @param array $dataFieldNames
     * @return self
     */
    public function fromModel(string $model, string $name, string $key = null, $dataFieldNames = []): Relation
    {
//        parent::fromModel($model, $name, $key);

        $key = $key ?? (app($model))->getModel()->getKeyName();

        $this->set('relationName', $name);
        $this->set('relationModel', Crypt::encryptString($model));
        $this->set('relationKey', Crypt::encryptString($key));
        $this->set('relationDataFieldNames', Crypt::encrypt($dataFieldNames));

        return $this->addBeforeRender(function () use ($model, $name, $key, $dataFieldNames) {
            $value = $this->get('value');

            if (! is_iterable($value)) {
                $value = Arr::wrap($value);
            }

            if (Assert::isIntArray($value)) {
                $value = $model::whereIn($key, $value)->get();
            }

            $value = collect($value)
                ->map(function ($item) use ($name, $key, $dataFieldNames) {
                    $ret = [
                        'id'   => $item->$key,
                        'text' => $item->$name,
                    ];

                    foreach ($dataFieldNames as $fieldName) {
                        $ret[$fieldName] = $item->{$fieldName};
                    }

                    return $ret;
                })->toJson();

            $this->set('value', $value);
        });
    }
}
