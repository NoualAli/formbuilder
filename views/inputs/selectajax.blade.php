@php
$data = $input->data;
$target = $input->target ? 'data-target=' . $input->target : null;
$action = $input->action ? 'data-action=' . $input->action : null;
$default_value = old($name) ?: $input->value;
@endphp

{{-- Input --}}
<select name="{{ $name }}" id="{{ $name }}" {{ $required }} class="select input @error($name) is-danger @enderror {{ $classes }}"
    {{ $target }} {{ $action }}>
    {{-- Data --}}
    <option value="">-</option>
    @foreach ($data as $key => $value)
        <option value="{{ $key }}" {{ $default_value == $key ? 'selected' : null }}>{{ $value }}
        </option>
    @endforeach
</select>
