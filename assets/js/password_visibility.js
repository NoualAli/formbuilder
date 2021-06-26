function handlePasswordVisibility($input) {
    $button = $input.parentElement.querySelector('.show-password')
    $button.addEventListener('click', () => {
        $icon = $button.querySelector('i')
        $input.type = $input.type == 'text' ? 'password' : 'text'
        $icon.className = $input.type == 'text' ? 'las la-eye-slash fa-lg' : 'las la-eye fa-lg'
    })
}

window.addEventListener('DOMContentLoaded', () => {
    $passwordInpuuts = document.querySelectorAll('input[type=password]')
    if ($passwordInpuuts.length) {
        $passwordInpuuts.forEach($input => {
            handlePasswordVisibility($input)
        })
    }
})
