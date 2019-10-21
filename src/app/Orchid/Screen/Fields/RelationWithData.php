<?php


namespace App\Orchid\Screen\Fields;

use Orchid\Screen\Fields\Relation;
use Illuminate\Support\Facades\Crypt;
use Orchid\Screen\Field;
use Orchid\Support\Assert;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class RelationWithData extends Relation
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

        $key = $key ?? (new $model())->getModel()->getKeyName();

        $this->set('relationModel', Crypt::encryptString($model));
        $this->set('relationName', Crypt::encryptString($name));
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
