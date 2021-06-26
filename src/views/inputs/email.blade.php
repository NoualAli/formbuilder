{{-- Input --}}
<input
    type="email"
    name="{{ $name }}"
    {{ $maxlength }}
    id="{{ $name }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $required }}
    class="input @error($name) is-danger @enderror {{ $classes }}"
    >
