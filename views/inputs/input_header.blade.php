@php
    $isSelect = $input->type == "select" || $input->type == "selectajax";
    $class = 'control';

    if($input->type == 'password'){
        $class .= ' has-icons-right';
    }
    if($input->icon){
        $class .= ' has-icons-left';
    }
    if($isSelect && !$input->help){
        $class .= ' select is-fullwidth';
    }
@endphp
@if ($addonsHelp)
    <div class="field has-addons">
@endif
{{-- Container --}}
<p class="{{ $class }}{{ $addonsHelp ? ' is-expanded' : null }}">
