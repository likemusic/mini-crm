<?php


namespace App\Common\Page\Element\Screen\Form\Field\RelationWithData;

use Orchid\Platform\Http\Controllers\Systems\RelationController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Orchid\Platform\Http\Controllers\Controller as BaseController;
use Orchid\Platform\Http\Requests\RelationRequest;
use App\Common\Page\Element\Screen\Form\Field\RelationWithData\FormRequest;

class Controller extends BaseController
{
    /**
     * @param FormRequest $request
     *
     * @return JsonResponse
     */
    public function view(FormRequest $request)
    {
        [
            'model' => $model,
            'key'   => $key,
            'scope' => $scope,
        ] = collect($request->except(['search', 'dataFieldNames', 'name']))->map(function ($item) {
            return is_null($item) ? null : Crypt::decryptString($item);
        });

        $name = $request->get('name');
        $dataFieldNames = Crypt::decrypt($request->get('dataFieldNames'));

        /** @var Model $builder */
        $model = app($model);
        $search = $request->get('search', '');

        if (! is_null($scope)) {
            $model = $model->{$scope}();
        }

        $items = $this->getItems($model, $name, $key, $search, $scope, $dataFieldNames);

        return response()->json($items);
    }

    /**
     * @param array|object|Model $model
     * @param string $name
     * @param string $key
     * @param string $search
     * @param string|null $scope
     *
     * @param null $dataFieldNames
     * @return Collection|array
     */
    private function getItems($model, string $name, string $key, string $search = null, string $scope = null, $dataFieldNames = null) : iterable
    {
        if (is_subclass_of($model, Model::class)) {
            $columns = [$name];

            if ($dataFieldNames) {
                $columns = array_merge($columns, $dataFieldNames);
            }

            return $model->where($name, 'like', '%'.$search.'%')->limit(10)->get($columns)->keyBy($key)->toArray();
        } elseif (! is_array($model) && property_exists($model, 'search')) {
            $model->search = $search;
        }

        /* Execution branch for source class */
        if (is_null($scope)) {
            $model = $model->handler();
        }

        $items = collect($model);

        if (! is_iterable($model)) {
            $items = collect($model->get());
        }

        if (! is_null($search) && $search !== '') {
            $items = $items->filter(function ($item) use ($name, $search) {
                return stripos($item[$name], $search) !== false;
            });
        }

        return $items->take(10)->pluck($name, $key);
    }
}
