@php
$value = $field->getValue();
$default_message = $field->getDefaultMessage() ?: "Ce champs ne peut pas être modifier";
$name = $field->getFieldName();
@endphp

{{-- Label --}}
@include('includes.inputs.label')

{{-- Container --}}
<p class="control{{ $default_message ? ' has-icons-right' : null }}">
    {{-- Input --}}
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="input" value="{{ $value }}" readonly>

    {{-- Default message --}}
    @include('includes.inputs.default_message')
</p>
