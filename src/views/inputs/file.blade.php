<div class="file is-info has-name is-boxed is-fullwidth">
    <label class="file-label">
        <input class="file-input" type="file" name="{{ $name }}" id="{{ $name }}">
        <span class="file-cta">
            <span class="file-icon">
                <i class="las la-cloud-upload-alt hvr-icon hvr-pulse-grow fa-lg"></i>
            </span>
        </span>
        <span class="show_file_informations">

        </span>
    </label>
</div>

{{-- Additional scripts --}}
@once
    @push('scripts')
        {{-- <script src="{{ asset('js/file.js') }}"></script> --}}
        <script>
            function filePreview() {
                const $fileInputs = document.querySelectorAll('.file-input')
                if ($fileInputs.length) {
                    $fileInputs.forEach($input => {
                        $input.addEventListener('change', () => {
                            const $parent = $input.parentElement
                            const $fileInformations = $parent.querySelector('.show_file_informations')
                            if ($input.files[0]) {
                                const file = $input.files[0]
                                const template = `
                                            <p class="has-text-weight-bold">${file.name}</p>
                                            <p>${formatBytes(file.size)}</p>
                                            `
                                $fileInformations.innerHTML = template
                                $fileInformations.classList.add('file-name')
                            } else {
                                $fileInformations.innerHTML = ''
                                $fileInformations.classList.remove('file-name')
                            }
                        })
                    })
                }
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }
            filePreview()

        </script>
    @endpush
@endonce
