@php
$default_message = $input->help ?: "Ce champs ne peut pas être modifier";
@endphp

{{-- Input --}}
<input type="text" name="{{ $name }}" id="{{ $name }}" class="input" value="{{ $value }}" readonly>
