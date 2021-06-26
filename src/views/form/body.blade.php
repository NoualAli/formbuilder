@foreach ($form->inputs as $input)
    @if (is_string($input))
        {!! $input !!}
    @else
    @if (is_array($input))
        <div class="field is-horizontal">
            <div class="field-body">
                @foreach ($input as $input)
                    {{-- Container --}}
                    <div class="field">
                        @include('FormBuilder::inputs.input')
                    </div>
                @endforeach
            </div>
        </div>
    @else
        {{-- Container --}}
        <div class="field">
            @include('FormBuilder::inputs.input')
        </div>
    @endif

    @endif
@endforeach
@include('FormBuilder::inputs.submit')
