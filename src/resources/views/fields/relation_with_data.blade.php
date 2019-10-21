@component($typeForm,get_defined_vars())
    <div data-controller="fields--relationWithData"
         data-fields--relationWithData-id="{{$id}}"
         data-fields--relationWithData-placeholder="{{$attributes['placeholder'] ?? ''}}"
         data-fields--relationWithData-value="{{  $value }}"
         data-fields--relationWithData-model="{{ $relationModel }}"
         data-fields--relationWithData-name="{{ $relationName }}"
         data-fields--relationWithData-key="{{ $relationKey }}"
         data-fields--relationWithData-scope="{{ $relationScope }}"
         data-fields--relationWithData-route="{{ route('platform.systems.relation-with-data') }}"
         data-fields--relationWithData-data_field_names="{{ $relationDataFieldNames }}"
    >
        <select id="{{$id}}" data-target="fields--relationWithData.select" @include('platform::partials.fields.attributes', ['attributes' => $attributes])>
        </select>
    </div>
@endcomponent
