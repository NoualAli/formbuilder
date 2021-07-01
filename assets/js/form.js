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


// DateTimePickers
const datePickers = bulmaCalendar.attach('[type="date"]');
const dateTimePickers = bulmaCalendar.attach('[type="datetime"]');
const timePickers = bulmaCalendar.attach('[type="time"]');


// Inputs max length counter
/**
 * Init a new counter element
 *
 * @return {null}
 */
function counter() {
    const $containers = document.querySelectorAll('[data-maxlength]')

    $containers.forEach($container => {
        const maxLength = $container.dataset.maxlength
        const $counter = createCounter(maxLength)
        const $input = $container.querySelector('[maxlength]')

        $container.append($counter)
        updateCounter($counter, $input, maxLength)
    });
}

/**
 * Create a new counter element
 *
 * @param {string|number} maxLength
 *
 * @return {null}
 */
function createCounter(maxLength) {
    const $counter = document.createElement('div')
    $counter.className = "field is-size-7 has-text-right has-text-weight-bold p-1 input-counter"
    $counter.innerHTML = "0/" + maxLength
    return $counter
}

/**
 * Update counter value
 *
 * @param {HTMLDivElement} $counter
 * @param {HTMLInputElement} $input
 * @param {string|number} maxLength
 *
 * @return {null}
 */
function updateCounter($counter, $input, maxLength) {
    maxLength = Number(maxLength) // convert string to number
        // Listen to input event
    $input.addEventListener('input', () => {
        setCounterValue($counter, $input, maxLength)
    })

    if ($input.value.length) {
        setCounterValue($counter, $input, maxLength)
    }
}

function setCounterValue($counter, $input, maxLength) {
    // for each input update current length
    let currentLength = $input.value.length
        // Update counter
    $counter.innerHTML = `${currentLength}/${maxLength}`
}

// Handle password visibility

function handlePasswordVisibility($input) {
    $button = $input.parentElement.querySelector('.show-password')
    $button.addEventListener('click', () => {
        $icon = $button.querySelector('i')
        $input.type = $input.type == 'text' ? 'password' : 'text'
        $icon.className = $input.type == 'text' ? 'las la-eye-slash fa-lg' : 'las la-eye fa-lg'
    })
}

// Handle select ajax field

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



window.addEventListener('DOMContentLoaded', () => {
    $passwordInpuuts = document.querySelectorAll('input[type=password]')
    if ($passwordInpuuts.length) {
        $passwordInpuuts.forEach($input => {
            handlePasswordVisibility($input)
        })
    }

    counter()
})