@foreach ($form->inputs as $input)
    @if (is_string($input))
        {!! $input !!}
    @else
    @if (is_array($input))
        <div class="field is-horizontal">
            <div class="field-body">
                @foreach ($input as $input)
                    @php
                        $maxlength = $input->maxlength ? 'data-maxlength=' . $input->maxlength : null;
                    @endphp
                    {{-- Container --}}
                    <div class="field" {{ $maxlength }}>
                        @include('FormBuilder::inputs.input')
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @php
            $maxlength = $input->maxlength ? 'data-maxlength=' . $input->maxlength : null;
        @endphp
        {{-- Container --}}
        <div class="field" {{ $maxlength }}>
            @include('FormBuilder::inputs.input')
        </div>
    @endif

    @endif
@endforeach
@include('FormBuilder::inputs.submit')
