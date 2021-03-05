import Modal from './Modal.js';
import { numberFormater } from '../helpers.js';

// Venta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()

        const ventaForm = document.getElementById('ventaForm')

        if (ventaForm) {
            const amount = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amount"]`)
            const currency = document.querySelector(`#${ventaForm.getAttribute('id')} [name="currency"]`)
            const payForm = document.querySelector(`#${ventaForm.getAttribute('id')} [name="payForm"]`)
            const payIn = document.querySelector(`#${ventaForm.getAttribute('id')} [name="payIn"]`)

            const amountRecieve = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amountRecieve"]`)
            const amountChange = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amountChange"]`)

            document.querySelector(`#${ventaForm.getAttribute('id')} [name="bankAccount"]`).value = "01027777777777"

            const ping = document.querySelector(`#${ventaForm.getAttribute('id')} .ping`)


            amount.addEventListener('blur', () => {
                calComisionVenta()
            })
            currency.addEventListener('change', () => {
                calComisionVenta()
            })

            // mostrar modal cuando se modifique monto o divisa, teniendo seleccionado una forma de abono
            async function calComisionVenta() {
                if (amount.value && (currency.options[currency.selectedIndex].value !== "Seleccione")) {

                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsell");
                    formData.append("amount", amount.value);
                    formData.append("currency", currency.options[currency.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountChange.value = numberFormater(res.currrate)
                        amountRecieve.value = numberFormater(res.totalves)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto Divisa a Cobrar: ${numberFormater(res.exchangeamount)}
                            </p>
                            <p>
                                ${res.txtcurrcommission}: ${numberFormater(res.currcommission)}
                            </p>
                            <p>
                                Tasa de Cambio:  ${numberFormater(res.currrate)}
                            </p>
                            <p>
                                ${res.txtvescommission}: ${numberFormater(res.vescommission)}
                            </p>
                            <p>
                                Total Recibir Bs. : ${numberFormater(res.totalves)}
                            </p>
                            `

                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html

                        // Entonces abreme el modal
                        if (payForm.options[payForm.selectedIndex].value !== "Seleccione") {
                            modal.openModal('operationSummary')
                        }
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', 'Datos incompletos', res.message)
                    } else {
                        modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                    }

                    modal.closeModal('loader')
                }
            }

            // Toggle para mostrar modal (mas info)
            payForm.addEventListener('change', async() => {
                // Mostramos boton de enviar
                if (ping.classList.contains('hidden')) {
                    ping.classList.remove('hidden')
                }

                // Abrir modal con datos
                modal.openModal('operationSummary')
            })

            // fetch final de venta
            ping.addEventListener('click', async() => {
                // GEN OTP FETCH
                // Cargando spinner
                modal.openModal('loader')
                let formData = new FormData()
                formData.append("cond", "genotp");
                let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                let resOtp = await dataOtp.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (resOtp.code == "0000") {
                    // abrir modal para ultimo fetch 
                    modal.openModal('otpVerification')
                    document.getElementById('otpCode').value = resOtp.otp

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                        e.preventDefault()
                        modal.closeModal('otpVerification')

                        // Cargando spinner
                        modal.openModal('loader')
                        let formData = new FormData(ventaForm)

                        formData.append("cond", "execsell");
                        formData.append("otp", resOtp.otp);
                        formData.append("payIn", payIn.options[payIn.selectedIndex].value);
                        formData.append("payForm", payForm.options[payForm.selectedIndex].value);
                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess')
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', 'Datos incompletos', res.message)
                        } else {
                            modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                        }
                        console.log(res);
                    })
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', 'Datos incompletos', res.message)
                } else {
                    modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                }
            })
        }
    })
}