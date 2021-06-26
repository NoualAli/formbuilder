@php
$startTime = $input->startTime ? 'data-start-time='.$input->startTime : null;
$endTime = $input->endTime ? 'data-end-time='.$input->endTime : null;
$color = $input->color ? 'data-color='.$input->color : null;
$lang = $input->lang ? 'data-lang='.$input->lang : null;
$isRange = $input->isRange ? 'data-is-range="true"' : null;
$displayMode = $input->display ? 'data-display-mode='.$input->display : null;
$clearLabel = $input->clearLabel ? 'data-clear-label='.$input->clearLabel : null;
$validateLabel = $input->validateLabel ? 'data-validate-label='.$input->validateLabel : null;
$cancelLabel = $input->cancelLabel ? 'data-cancel-label='.$input->cancelLabel : null;
$labelFrom = $input->isRange ? 'data-label-from='.$input->labelFrom : null;
$labelTo = $input->isRange ? 'data-label-to='.$input->labelTo : null;
$placeholder = $input->placeholder ? 'placeholder='.$input->placeholder : null;
$timeFormat = $input->timeFormat && $input->withTime ? 'data-time-format='.$input->timeFormat : null;
@endphp

{{-- Input --}}
<input
    type="time"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ $value }}"
    {{ $color }}
    {{ $displayMode }}
    {{ $cancelLabel }}
    {{ $clearLabel }}
    {{ $validateLabel }}
    {{ $lang }}
    {{ $isRange }}
    {{ $labelFrom }}
    {{ $labelTo }}
    {{ $timeFormat }}
    {{ $startTime }}
    {{ $endTime }}
    {{ $placeholder }}
    class="input @error($name) is-danger @enderror date-input {{ $classes }}"
>
