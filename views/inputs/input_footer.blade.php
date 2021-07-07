{{-- Icon --}}
@include('FormBuilder::inputs.input_left_icon')

</p>

{{-- Help message --}}
@include('FormBuilder::inputs.help_message')

@if (!$addonsHelp)
    {{-- Error validation message --}}
    @include('FormBuilder::inputs.message')
@endif

@if ($addonsHelp)
    </div>
@endif

@if ($addonsHelp)
    {{-- Error validation message --}}
    @include('FormBuilder::inputs.message')
    </div>
@endif
