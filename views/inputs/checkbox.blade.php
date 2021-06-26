@php
$data = $input->data;
$default_value = $value;
@endphp
@if ($data)
    @foreach ($data as $key => $value)
        {{-- Input --}}
        <input type="checkbox" class="checkbox is-checkradio is-info" name="{{ $name.'[]' }}" id="{{ $value . '-' . $name }}"
            value="{{ $value }}" {{ (is_array($default_value) ? in_array($value, $default_value) : $default_value == $value) ? 'checked' : null }}>
        <label for="{{ $value . '-' . $name }}"
            {{ optional($input->label) ? ' class=has-text-weight-medium' : null }}>
            {{ $key }}
        </label>
    @endforeach
@endif
