{{-- Input --}}
<input type="text" name="{{ $name }}" {{ $required }} {{ $maxlength }} id="{{ $name }}"
    value="{{ $value }}" placeholder="{{ $placeholder }}" autocomplete="{{ $input->autocomplete }}"
    class="input @error($name) is-danger @enderror {{ $classes }}">
