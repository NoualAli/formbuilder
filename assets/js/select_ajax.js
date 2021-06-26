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
