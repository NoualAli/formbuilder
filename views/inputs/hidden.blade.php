@php
    $name = $field->getFieldName();;
    $value = $field->getValue();
@endphp
<input type="hidden" name="{{ $name }}" value="{{ $value }}">