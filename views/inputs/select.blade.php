@php
$data = $input->data;
$default_value = $value;
@endphp

{{-- Input --}}
<select name="{{ $name }}" id="{{ $name }}" {{ $required }} class="select input @error($name) is-danger @enderror {{ $classes }}">
    {{-- Data --}}
    <option value="">-</option>
    @foreach ($data as $key => $value)
        <option value="{{ $key }}" {{ $default_value == $key ? 'selected' : null }}>{{ $value }}
        </option>
    @endforeach
</select>
