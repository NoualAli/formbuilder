{{-- Icon --}}
@include('FormBuilder::inputs.input_left_icon')

</p>

{{-- Help message --}}
@include('FormBuilder::inputs.help_message')

{{-- Error validation message --}}
@include('FormBuilder::inputs.message')

@if ($addonsHelp)
    </div>
@endif
