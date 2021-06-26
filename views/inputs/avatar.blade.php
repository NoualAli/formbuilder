@php
    $picture = $field->getValue() ? $field->getValue() : asset('images/app/default_user.jpeg');
    $name = $field->getFieldName();
@endphp
<div class="avatar-upload">
    <div class="avatar-edit">
        <input type='file' class="imageUpload" id="{{ $name }}" name="{{ $name }}" accept=".png, .jpg, .jpeg" />
        <label for="{{ $name }}">
            <i class="las la-camera"></i>
        </label>
    </div>
    <div class="avatar-preview">
        {{-- <div id="imagePreview" style="background-image: url({{ $picture }});">
        </div> --}}
        <img src="{{ $picture }}" alt="" id="imagePreview">
    </div>
</div>
@include('includes.inputs.message')

{{-- Additional scripts --}}
@once
    @push('scripts')
        <script src="{{ asset('js/image_preview.js') }}"></script>
    @endpush
@endonce