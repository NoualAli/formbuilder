@if ($addonsHelp)
    <p class="control">
        <a class="button is-static" style="pointer-events: all !important" title="{!! $input->help !!}">
            <i class="las la-exclamation-circle fa-lg has-text-info"></i>
        </a>
    </p>
@endif

@if ($inlineTextHelp)
<span class="icon-text pt-2">
    <span class="icon has-text-info">
        <i class="las la-exclamation-circle fa-lg"></i>
    </span>
    <span>{{ $input->help }}</span>
</span>
@endif
