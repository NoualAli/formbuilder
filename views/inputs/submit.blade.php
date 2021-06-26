@php
    $text = $form->submit['text'];
    $classes = empty($form->submit['classes']) ? 'is-success' : implode(' ', $form->submit['classes']);

    $parent_classes = isset($submit['parent_classes']) ? $submit['parent_classes'] : [];
    $icon = isset($form->submit['icon']) ? $form->submit['icon'] : 'save';
@endphp

<div class="field {{ implode(' ', $parent_classes) }}">
    <p class="control">
        <button class="button {{ $classes }}" type="submit">
            <span class="icons">
                <i class="las la-{{ $icon }}"></i>
            </span>
            {{ $text }}
        </button>
    </p>
</div>
