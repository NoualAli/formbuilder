@if ($input->icon)
<span class="icon is-left">
    <i class="las la-{{ $input->icon }} fa-lg @error($name) has-text-danger @enderror"></i>
</span>
@endif
