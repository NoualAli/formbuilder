//////////////////////////////////////////////////////////////
// Max length for inputs
//////////////////////////////////////////////////////////////

function setMaxLength() {
    const inputs = document.querySelectorAll('[maxlength]')

    if (inputs.length >= 1) {
        inputs.forEach(input => {
            const maxLength = input.maxLength
            showMaxLength(input, maxLength)

            input.addEventListener('input', () => {
                updateMaxLengthCounter(input)
            })
        })
    }
}

function showMaxLength(elt, maxLength) {
    const maxLengthElt = document.createElement('div')
    maxLengthElt.className = "field is-size-7 has-text-right has-text-weight-bold p-1 input-counter"
    maxLengthElt.innerHTML = elt.value.length + "/" + maxLength

    if (elt.parentElement.classList.contains("field")) {
        if (!elt.parentElement.querySelector('.input-counter')) {
            elt.parentElement.parentElement.append(maxLengthElt)
        }
    } else {
        if (!elt.parentElement.parentElement.parentElement.querySelector('.input-counter')) {
            elt.parentElement.parentElement.parentElement.append(maxLengthElt)
        }
    }
}

function updateMaxLengthCounter(elt) {
    const maxLengthElt = elt.parentElement.parentElement.querySelector('.input-counter') ? elt.parentElement.parentElement.querySelector('.input-counter') : elt.parentElement.parentElement.parentElement.querySelector('.input-counter')
    const maxLength = elt.maxLength
    if (elt.value.length >= maxLength) {
        maxLengthElt.classList.add('has-text-danger')
    } else {
        maxLengthElt.classList.remove('has-text-danger')
    }
    maxLengthElt.innerHTML = elt.value.length + "/" + maxLength
}


setMaxLength()

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

//////////////////////////////////////////////////////////////
// End max length
//////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////
// Ajax select
//////////////////////////////////////////////////////////////
/**
 * @param url url
 *
 * @return Promise
 */
async function __get(url) {
    const headers = {
        'X-Requested-With': 'XMLHttpRequest',
    }
    const config = {
        method: 'GET',
        url: url,
        headers: headers
    }

    return await axios(config).then(response => {
        return response
    }).catch(error => {
        return error
    })
}

const $ajaxSelect = document.querySelectorAll('select[data-target]')

if ($ajaxSelect.length) {
    $ajaxSelect.forEach(select => {
        select.addEventListener('change', async() => {
            const $target = document.querySelector(`#${select.dataset.target}`)
            $target.innerHTML = '';
            if (select.value) {
                handleSelectLoading($target, true)
                let dataUrl = select.dataset.action
                const url = dataUrl + '/' + select.value
                const data = (await __get(url)).data
                fillSelectTarget(data, $target)
            }

        })
    })
}

/**
 * @param object data
 * @param HTMLSelectElement $target
 *
 * @return void
 */
async function fillSelectTarget(data, $target) {
    $target.innerHTML = ''
    for (const key in data) {
        const value = data[key]
        createElements(value, key, $target)
    }
    handleSelectLoading($target)
    filleNextTarget($target)
}

/**
 * @param HTMLSelectElement $element
 *
 * @return void
 */
async function filleNextTarget($element) {
    if ($element.hasAttribute('data-target')) {
        const $target = document.querySelector(`#${$element.dataset.target}`)
        handleSelectLoading($target, true)
        const dataUrl = $element.dataset.action

        const url = dataUrl + '/' + $element.value
        const data = (await __get(url)).data
        fillSelectTarget(data, $target)
    }
}

/**
 * @param string value
 * @param string key
 * @param HTMLSelectElement $target
 *
 * @return void
 */
function createElements(value, key, $target) {
    let optElt = document.createElement('option')
    optElt.value = key
    optElt.innerHTML = value
    $target.append(optElt)
}

function handleSelectLoading($select, isLoading = false) {
    if (isLoading) {
        $select.parentElement.classList.add('is-loading')
    } else {
        $select.parentElement.classList.remove('is-loading')
    }
}

//////////////////////////////////////////////////////////////
// End ajax select
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
// Date input
//////////////////////////////////////////////////////////////

const datePickers = bulmaCalendar.attach('[type="date"]');
const dateTimePickers = bulmaCalendar.attach('[type="datetime"]');
const timePickers = bulmaCalendar.attach('[type="time"]');

//////////////////////////////////////////////////////////////
// End Date input
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
// Password input
//////////////////////////////////////////////////////////////

$passwordInpuuts = document.querySelectorAll('input[type=password]')

if ($passwordInpuuts.length) {
    $passwordInpuuts.forEach($input => {
        handlePasswordVisibility($input)

    })
}

function handlePasswordVisibility($input) {
    $button = $input.parentElement.querySelector('.show-password')
    $button.addEventListener('click', () => {
        $icon = $button.querySelector('i')

        if ($input.type == 'password') {
            $input.type = 'text'
            $icon.classList.remove('la-eye')
            $icon.classList.add('la-eye-slash')
        } else {
            $input.type = 'password'
            $icon.classList.add('la-eye')
            $icon.classList.remove('la-eye-slash')
        }
    })
}