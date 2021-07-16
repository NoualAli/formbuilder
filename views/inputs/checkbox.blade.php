@php
$data = $input->data;
$default_value = $value;
@endphp
@if ($data)
    @if (count($data) > 1)
        @foreach ($data as $key => $value)
            {{-- Input --}}
            <input type="checkbox" class="checkbox is-checkradio is-info" name="{{ $name . '[]' }}"
                id="{{ $value . '-' . $name }}" value="{{ $value }}"
                {{ (is_array($default_value) ? in_array($value, $default_value) : $default_value == $value) ? 'checked' : null }}>
            <label for="{{ $value . '-' . $name }}"
                {{ optional($input->label) ? ' class=has-text-weight-medium' : null }}>
                {{ $key }}
            </label>
        @endforeach
    @else
        @php
            $key = array_key_first($data);
            $value = $data[$key];
        @endphp
        {{-- Input --}}
        <input type="checkbox" class="checkbox is-checkradio is-info" name="{{ $name }}"
            id="{{ $value . '-' . $name }}" value="{{ $value }}"
            {{ (is_array($default_value) ? in_array($value, $default_value) : $default_value == $value) ? 'checked' : null }}>
        <label for="{{ $value . '-' . $name }}"
            {{ optional($input->label) ? ' class=has-text-weight-medium' : null }}>
            {{ $key }}
        </label>
    @endif
@endif
