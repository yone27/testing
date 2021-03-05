export default class Modal {
    initModal = () => {
        const openEls = document.querySelectorAll("[data-open]")
        const closeEls = document.querySelectorAll("[data-close]")
        const removeEls = document.querySelectorAll("[data-remove]")
        const isVisible = "is-visible"

        // abrir modales
        for (const el of openEls) {
            el.addEventListener("click", function() {
                const modalId = this.dataset.open
                document.getElementById(modalId).classList.add(isVisible)
            })
        }

        // cerrando modal en el boton
        for (const el of closeEls) {
            el.addEventListener("click", function(e) {
                e.preventDefault()
                this.closest(".modal").classList.remove(isVisible)
            })

            // cerrando modal por fuera
            document.addEventListener("click", e => {
                if (e.target == document.querySelector(".modal.is-visible")) {
                    document.querySelector(".modal.is-visible").classList.remove(isVisible)
                }

                //presionando escape
                document.addEventListener("keyup", e => {
                    if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                        document.querySelector(".modal.is-visible").classList.remove(isVisible)
                    }
                })
            })
        }

        // cerrando modal en el boton
        for (const el of removeEls) {
            el.addEventListener("click", function(e) {
                e.preventDefault()
                this.closest(".modal").remove(isVisible)
            })
        }
    }
    openModal = (idmodal, title = "", message = "") => {
        const miModal = document.getElementById(idmodal)
        if (title && message) {
            document.querySelector(`#${miModal.getAttribute('id')} .modal__title`).innerHTML = title
            document.querySelector(`#${miModal.getAttribute('id')} .modal__text`).innerHTML = message
        }
        if (miModal) {
            miModal.classList.add('is-visible')
        }
    }
    closeModal = (idmodal) => {
        const miModal = document.getElementById(idmodal)
        if (miModal) {
            miModal.classList.remove('is-visible')
        }
    }
    removeModal = (idmodal) => {
        const miModal = document.getElementById(idmodal)
        miModal.remove()
    }
}