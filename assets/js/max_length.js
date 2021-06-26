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
    let currentLength = 0 // init current length to 0

    // Listen to input event
    $input.addEventListener('input', () => {
        // for each input update current length
        currentLength = $input.value.length
            // Update counter
        $counter.innerHTML = `${currentLength}/${maxLength}`
    })
}


window.addEventListener('DOMContentLoaded', () => {
    counter()
})
