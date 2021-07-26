@php
$data = $input->data;
$target = $input->target ? 'data-target=' . $input->target : null;
$action = $input->action ? 'data-action=' . $input->action : null;
$default_value = $value;
$isGroup = $input->is_group;
@endphp

{{-- Input --}}
<select name="{{ $name }}" id="{{ $name }}" {{ $required }}
    class="select input @error($name) is-danger @enderror {{ $classes }}" {{ $target }} {{ $action }}>
    {{-- Data --}}
    <option value="">-</option>
    @if (!$isGroup)
        @foreach ($data as $key => $value)
            <option value="{{ $key }}" {{ $default_value == $key ? 'selected' : null }}>{{ $value }}</option>
        @endforeach
    @else
        @foreach ($data as $title => $items)
            <optgroup label="{{ $title }}">
                @foreach ($items as $key => $value)
                    <option value="{{ $key }}" {{ $default_value == $key ? 'selected' : null }}>{{ $value }}</option>
                @endforeach
            </optgroup>
        @endforeach
    @endif
</select>
