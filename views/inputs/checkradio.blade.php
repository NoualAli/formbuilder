@php
$data = $input->data;
$default_value = $value;
@endphp

@if ($data)
    @foreach ($data as $key => $value)
        {{-- Input --}}
        <input type="radio" class="checkbox is-checkradio is-info" name="{{ $name }}"
            id="{{ $key . '-' . $name }}" value="{{ $key }}"
            {{ $default_value == $key ? 'checked' : null }}>
        <label for="{{ $key . '-' . $name }}"
            {{ optional($input->label) ? ' class=has-text-weight-medium' : null }}>
            {{ $value }}
        </label>
    @endforeach
@endif
