@php
$acceptNegative = !$input->negative ? 'min=0' : null;
$min = $input->negative && $input->min ? 'min=' . $input->min : null;
$max = $input->max ? 'max=' . $input->max : null;
@endphp

{{-- Input --}}
<input
    type="number"
    name="{{ $name }}"
    {{-- {{ $input->maxlength }} --}}
    id="{{ $name }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $acceptNegative }}
    {{ $min }}
    {{ $max }}
    onKeyPress="if(this.value.length=={{$input->maxlength}}) return false";
    {{ $maxlength }}
    {{ $required }}
    class="input numbers-only @error($name) is-danger @enderror {{ $classes }}"
    >
