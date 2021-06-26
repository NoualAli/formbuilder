@php
$startDate = $value ? 'data-start-date='.$value : null;
$endDate = $input->endDate ? 'data-end-date='.$input->endDate : null;
$startTime = $input->startTime ? 'data-start-time='.$input->startTime : null;
$endTime = $input->endTime ? 'data-end-time='.$input->endTime : null;
$color = $input->color ? 'data-color='.$input->color : null;
$lang = $input->lang ? 'data-lang='.$input->lang : null;
$isRange = $input->isRange ? 'data-is-range="true"' : null;
$displayMode = $input->display ? 'data-display-mode='.$input->display : null;
$dateFormat = $input->dateFormat ? 'data-date-format='.$input->dateFormat : null;
$clearLabel = $input->clearLabel ? 'data-clear-label='.$input->clearLabel : null;
$validateLabel = $input->validateLabel ? 'data-validate-label='.$input->validateLabel : null;
$todayLabel = $input->todayLabel ? 'data-today-label='.$input->todayLabel : null;
$cancelLabel = $input->cancelLabel ? 'data-cancel-label='.$input->cancelLabel : null;
$labelFrom = $input->isRange ? 'data-label-from='.$input->labelFrom : null;
$labelTo = $input->isRange ? 'data-label-to='.$input->labelTo : null;
$allowSameDayRange = $input->isRange && $input->allowSameDayRange ? 'data-allow-same-day-range=true' : 'data-allow-same-day-range=false';
$timeFormat = $input->timeFormat && $input->withTime ? 'data-time-format='.$input->timeFormat : null;
$type = 'date';
if($input->withTime){
    $type = 'datetime';
}
@endphp

{{-- Input --}}
<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ $value }}"
    {{ $startDate }}
    {{ $color }}
    {{ $displayMode }}
    {{ $cancelLabel }}
    {{ $clearLabel }}
    {{ $validateLabel }}
    {{ $todayLabel }}
    {{ $dateFormat }}
    {{ $lang }}
    {{ $isRange }}
    {{ $labelFrom }}
    {{ $labelTo }}
    {{ $allowSameDayRange }}
    {{ $timeFormat }}
    {{ $startTime }}
    {{ $placeholder }}
    {{ $endDate }}
    {{ $endTime }}
    class="input @error($name) is-danger @enderror date-input {{ $classes }}"
>
