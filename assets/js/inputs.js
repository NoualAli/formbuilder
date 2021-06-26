require('./datetimepicker')
require('./max_length')
require('./password_visibility')
require('./select_ajax')

const $nembersOnly = document.querySelectorAll('.numbers-only')
$nembersOnly.forEach($input => {
    $input.addEventListener('keypress', e => {
        acceptOnlyNumbers(e)
    })
});

function acceptOnlyNumbers(e) {
    const regex = "[0-9]"
    const regexp = new RegExp(regex)
    if (e.key.match(regexp) !== null || e.keyCode == 13) {
        return true
    }
    e.preventDefault()
}
