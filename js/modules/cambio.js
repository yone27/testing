import Modal from './Modal.js';
import { numberFormater } from '../helpers.js';

// Cambio
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()

        const cambioForm = document.getElementById('cambioForm')
        if (cambioForm) {
            const paidMethod = document.querySelector(`#${cambioForm.getAttribute('id')} [name="paidMethod"]`)
            const recieveCurrency = document.querySelector(`#${cambioForm.getAttribute('id')} [name="recieveCurrency"]`)
            const sendCurrency = document.querySelector(`#${cambioForm.getAttribute('id')} [name="sendCurrency"]`)
            const recieveMethod = document.querySelector(`#${cambioForm.getAttribute('id')} [name="recieveMethod"]`)
            const ping = document.querySelector(`#${cambioForm.getAttribute('id')} .ping`)

            // mostrar modal cuando se modifique monto o divisa, teniendo seleccionado una forma de abono
            async function calComisionCompra() {
                if (amount.value && (currency.options[currency.selectedIndex].value !== "Seleccione")) {

                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcexchange");
                    formData.append("otp", resOtp.otp);
                    formData.append("sendCurrency", sendCurrency.options[sendCurrency.selectedIndex].value);
                    formData.append("recieveCurrency", recieveCurrency.options[recieveCurrency.selectedIndex].value);
                    formData.append("recieveMethod", recieveMethod.options[recieveMethod.selectedIndex].value);
                    formData.append("paidMethod", paidMethod.options[paidMethod.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
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
            recieveCurrency.addEventListener('change', async() => {
                // Mostramos boton de enviar
                if (ping.classList.contains('hidden')) {
                    ping.classList.remove('hidden')
                }

                calComisionCompra()

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
                        let formData = new FormData(cambioForm)

                        formData.append("cond", "calcexchange");
                        formData.append("otp", resOtp.otp);
                        formData.append("sendCurrency", sendCurrency.options[sendCurrency.selectedIndex].value);
                        formData.append("recieveCurrency", recieveCurrency.options[recieveCurrency.selectedIndex].value);
                        formData.append("recieveMethod", recieveMethod.options[recieveMethod.selectedIndex].value);
                        formData.append("paidMethod", paidMethod.options[paidMethod.selectedIndex].value);

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