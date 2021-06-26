{{-- Input --}}
<input
    type="password"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $required }}
    autocomplete="new-password"
    class="input @error($name) is-danger @enderror {{ $classes }}"
    >
    <span class="icon is-right show-password" style="pointer-events: all !important; cursor:pointer">
        <i class="las la-eye fa-lg"></i>
    </span>
