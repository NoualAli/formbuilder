@php
$data = $input->data;
$default_value = $value;
@endphp

@if ($data)
    @foreach ($data as $key => $value)
        {{-- Input --}}
        <input type="radio" class="checkbox is-checkradio is-info" name="{{ $name }}" id="{{ $value . '-' . $name }}"
            value="{{ $value }}" {{ $default_value == $value ? 'checked' : null }}>
        <label for="{{ $value . '-' . $name }}"
            {{ optional($input->label) ? ' class=has-text-weight-medium' : null }}>
            {{ $key }}
        </label>
    @endforeach
@endif
