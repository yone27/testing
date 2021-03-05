import Modal from './Modal.js';

export function test(title, message, idForm) {
    const inputs = document.querySelectorAll(`#${idForm} label.required + *`)
    const modal = new Modal()

    let flag = 0
    for (const input of inputs) {
        if (input.value == null || input.value.length == 0 || /^\s+$/.test(input.value)) {
            flag = 1
        }
    }

    // Abre modal
    if (flag === 1) {
        let modalTitle = document.querySelector('#modalDanger .modal__title').innerHTML = title
        let modalMessage = document.querySelector('#modalDanger .modal__text').innerHTML = message
        modal.openModal('modalDanger')
        return false
    } else {
        return true
    }
}