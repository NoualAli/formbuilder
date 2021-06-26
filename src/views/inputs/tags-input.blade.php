@include('includes.inputs.label', $field)
<p class="control">
    <select data-case-sensitive="false" multiple data-type="tags" data-placeholder="{{ $field['placeholder'] }}" class="input" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
        @if (isset($field['data']))
            @foreach ($field['data'] as $item)
                @php
                    $attribute = $field['attribute'],
                    $id = isset($field['id']) ? $field['id'] : $attribute;
                    $default_selected = isset($field['default_selected']) ? $field['default_selected'] : null;
                @endphp
                <option value="{{ $item->$id }}"
                    {{ in_array($item->$id, $default_selected->pluck($id)->toArray()) ? 'selected' : null }}>
                    {{ $item->$attribute }}</option>
            @endforeach
        @endif
    </select>
</p>
@include('includes.inputs.message', $input)
