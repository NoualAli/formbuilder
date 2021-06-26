@php
$name = $input->name;
$classes = implode(' ', $input->classes);
$placeholder = $input->placeholder;
$required = $input->required ? 'required=required' : null;
$maxlength = $input->maxlength ? 'maxlength=' . $input->maxlength : null;
$value = old($name) ?: $input->value;

$addonsHelp = $input->help && $input->type !== 'checkbox' && $input->type !== 'checkradio' && $input->type !== 'file';
$inlineTextHelp = $input->help && ($input->type == 'checkbox' || $input->type == 'checkradio' || $input->type == 'file');
@endphp

{{-- Label --}}
@include('FormBuilder::inputs.label')

{{-- Input container --}}
@include('FormBuilder::inputs.input_header')
@include('FormBuilder::inputs.'.$input->type)
@include('FormBuilder::inputs.input_footer')
