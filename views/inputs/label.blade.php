@php
    $label = optional($input->label);
    $required = $label->required ? " required" : null;
    $text = $label->text;
    $inputName = $label->input;
@endphp
@if ($label)
<label for="{{ $inputName }}" class="label{{ $required }} @error($inputName) has-text-danger @enderror">{{ $text }}</label>
@endif
