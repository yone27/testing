import Modal from './Modal.js';
import { test } from './validations.js';
import { numberFormater } from '../helpers.js';

// Envio
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()

        const encomiendaForm = document.getElementById('encomiendaForm')
        const transferenciaForm = document.getElementById('transferenciaForm')
        const billeteraForm = document.getElementById('billeteraForm')

        // Billetera
        if (billeteraForm) {
            const amountWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="amountWallet"]`)
            const currencyWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="currencyWallet"]`)
            const users = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="users"]`)
            const btnSubmitBilletera = document.querySelector('[data-targetping="billetera"]')
            const beneficiarioWallet = document.getElementById('beneficiarioWallet')

            amountWallet.addEventListener('blur', () => {
                step1Wallet()
            })
            currencyWallet.addEventListener('change', () => {
                step1Wallet()
            })

            // Resumen de operacion
            async function step1Wallet() {
                // Cuando ambos campos esten llenos seguiente etapa
                if (amountWallet.value && (currencyWallet.options[currencyWallet.selectedIndex].value !== "Seleccione")) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendw");
                    formData.append("amountWallet", amountWallet.value);
                    formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // Quitando spinner
                    modal.closeModal('loader')

                    // Fetch exitoso
                    if (res.code == "0000") {
                        // liberando inputs y mostrando los resultados
                        let resAmount = new Intl.NumberFormat().format(amountWallet.value),
                            resComission = new Intl.NumberFormat().format(res.usdcommission)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto envio en divisa: ${parseInt(resAmount).toFixed(2)}
                            </p>
                            <p>
                                ${res.txtusdcommission}: ${parseInt(resComission).toFixed(2)}
                            </p>
                        `
                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html

                        modal.openModal('operationSummary')
                        beneficiarioWallet.classList.remove('hidden')

                    } else {
                        console.log('Error interno');
                    }
                }
            }

            beneficiarioWallet.addEventListener('change', () => {
                // Mostramos boton de enviar
                btnSubmitBilletera.classList.remove('hidden')
            })


            btnSubmitBilletera.addEventListener('click', async e => {
                e.preventDefault()
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

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', e => {
                        e.preventDefault()

                        finalFetch()
                    })
                } else {
                    modal.openModal('modalDanger')
                }

            })

            async function finalFetch() {
                // ENVIO FETCH
                // Todo: validar campos
                let formData = new FormData()
                formData.append("cond", "addEnvio");
                formData.append("amountWallet", amountWallet.value);
                formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value);
                formData.append("users", users.options[users.selectedIndex].value);
                modal.closeModal('otpVerification')

                // Cargando spinner
                modal.openModal('loader')

                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (res.code === "0000") {
                    modal.openModal('modalSuccess')
                } else {
                    modal.openModal('modalDanger')
                }
            }

        }

        if (encomiendaForm) {
            const paidFormCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="paidFormCommend"]`)
            const amountCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="amountCommend"]`)
            const countryCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="countryCommend"]`)
            const providerCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="providerCommend"]`)
            const exchangeRateCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="exchangeRateCommend"]`)
            const amountBsCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="amountBsCommend"]`)
            const usersCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="usersCommend"]`)
            const btnAddWallet = document.getElementById('btnAddWallet')

            const efectivoCommend = document.getElementById('efectivoCommend')
            const depositCommend = document.getElementById('depositCommend')
            const beneficiarioCommend = document.getElementById('beneficiarioCommend')
            const btnSubmitCommend = document.querySelector('[data-targetping="encomienda"]')

            amountCommend.addEventListener('blur', () => {
                calculandoEnvioCamioMonto()
            })
            countryCommend.addEventListener('change', () => {
                calculandoEnvioCamioMonto()
            })
            providerCommend.addEventListener('change', () => {
                calculandoEnvioCamioMonto()
            })

            async function calculandoEnvioCamioMonto() {
                if (amountCommend.value && (countryCommend.options[countryCommend.selectedIndex].value !== "Seleccione") && (providerCommend.options[providerCommend.selectedIndex].value !== "Seleccione")) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendenvio");
                    formData.append("amountCommend", amountCommend.value);
                    formData.append("countryCommend", countryCommend.options[countryCommend.selectedIndex].value);
                    formData.append("providerCommend", providerCommend.options[providerCommend.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountBsCommend.value = numberFormater(res.totalves)
                        exchangeRateCommend.value = numberFormater(res.usdrate)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto Divisa a Enviar: ${numberFormater(amountCommend.value)}
                            </p>
                            <p>
                                ${res.txtusdcommission}: ${numberFormater(res.usdcommission)}
                            </p>
                            <p>
                                Tasa de Cambio:  ${numberFormater(res.usdrate)}
                            </p>
                            <p>
                                ${res.txtvescommission}: ${numberFormater(res.vescommission)}
                            </p>
                            <p>
                                Total Enviar Bs. : ${numberFormater(res.totalves)}
                            </p>
                            `
                        const inner = document.querySelector('#modalEncomienda .modal-body')
                        inner.innerHTML = html
                    } else {
                        // Mostramos alerta de errore
                        console.log('problems');
                    }

                    modal.closeModal('loader')
                }
            }
            // -tasa de cambio y monto se llenan cuando (proveedor, pais, monto) sean completados

            // Toggle para add beneficiario
            btnAddWallet.addEventListener('click', e => {
                e.preventDefault()
                let userInfo = document.getElementById('userCommend')
                if (userInfo.classList.contains('hidden')) {
                    userInfo.classList.remove('hidden')
                } else {
                    userInfo.classList.add('hidden')
                }
            })

            // Toggle para mas inputs del formulario de encomienda
            paidFormCommend.addEventListener('change', async() => {
                // Mostramos boton de enviar
                let valueSelected = paidFormCommend.options[paidFormCommend.selectedIndex].value;
                /*
                1 = Efectivo
                2 = Billetera 
                3 = Depósito en Cuenta
                */

                if (valueSelected === "1") {
                    efectivoCommend.classList.remove('hidden')
                    beneficiarioCommend.classList.remove('hidden')

                    // Poner hidden los demas
                    depositCommend.classList.add('hidden')
                } else if (valueSelected === "2") {
                    beneficiarioCommend.classList.remove('hidden')

                    // Poner hidden los demas
                    efectivoCommend.classList.add('hidden')
                    depositCommend.classList.add('hidden')
                } else if (valueSelected === "3") {
                    depositCommend.classList.remove('hidden')
                    beneficiarioCommend.classList.remove('hidden')

                    // Poner hidden los demas
                    efectivoCommend.classList.add('hidden')
                }

                // Abrir modal con datos
                modal.openModal('modalEncomienda')
            })

            // Agregar usuario estatico al select y ocultando los campos nuevamente
            addContact.addEventListener('click', e => {
                e.preventDefault()
                if (test('Beneficiario', 'Debe llenar los campos obligatorios!', 'userCommend')) {
                    let userInfo = document.getElementById('userCommend')
                    const firstNameCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="firstNameCommend"]`)
                    const firstSurnameCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="firstSurnameCommend"]`)

                    // let html = `<option value="1">${firstNameCommend.value} - ${firstSurnameCommend.value} </option>`
                    let html = `<option value="1">YONE - GONZALEZ </option>`
                    let node = document.createElement('option')
                    node.setAttribute('value', 1)
                    node.setAttribute('selected', true)
                    node.innerHTML = html
                    usersCommend.append(node)

                    // TODO: validar todos los campos

                    // ocultamos los campos nuevamente
                    userInfo.classList.add('hidden')

                    // Mostramos el ping button
                    btnSubmitCommend.classList.remove('hidden')
                }
            })

            btnSubmitCommend.addEventListener('click', async e => {
                e.preventDefault()

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
                        let valueSelected = paidFormCommend.options[paidFormCommend.selectedIndex].value;

                        // Billetera
                        modal.closeModal('otpVerification')

                        // Cargando spinner
                        modal.openModal('loader')
                        let formData = new FormData(encomiendaForm)

                        formData.append("cond", "commendWallet");
                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess')
                        } else {
                            modal.openModal('modalDanger')
                        }
                    })
                } else {
                    modal.openModal('modalDanger')
                }
            })
        }

        if (transferenciaForm) {
            const btnSubmitTransfer = document.querySelector('[data-targetping="transferencia"]')
            const beneficiarioTransfer = document.getElementById(`beneficiarioTransfer`)
                ///// POR MODIFICAR 
                //Idlead <- falta por indicar, esta hardcode
                //idcountry
            const countryTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="countryTransfer"]`)
                //idcurrency
            const currencyTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="currencyTransfer"]`)
                //amount
            const amountTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="amountTransfer"]`)
                //idclearencetype
            const paidFormTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="paidFormTransfer"]`)
                //Acc
            const receivingAccount = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="receivingAccount"]`)
                //reference
                //REFERENCIA DEPOSITO EN CUENTA
            const referenceTransferDeposit = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="referenceTransferDeposit"]`)
                //REFERENCIA EFECTIVO
            const referenceTransferCash = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="referenceTransferCash"]`)
                //FirstName
            const firstNameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="firstNameTransfer"]`)
                //bmiddlename
            const secondNameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="secondNameTransfer"]`)
                //blastname
            const firstSurnameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="firstSurnameTransfer"]`)
                //bsecondlastname
            const secondSurnameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="secondSurnameTransfer"]`)
                //bdocumentid
            const exchangeRateTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="exchangeRateTransfer"]`)
                //bacc
            const accountTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="accountTransfer"]`)
                //bbank
            const bankTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="bankTransfer"]`)
                //bbankcountry
            const countryBankTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="countryBankTransfer"]`)
                //Bbankcity
            const cityBankTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="cityBankTransfer"]`)
                //bbankaddress
            const addressTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="addressTransfer"]`)
                //bbankabaswiftiban
            const abaSwiftIban = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="abaSwiftIban"]`)
                //ibacc
            const accountTransferIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="accountTransferIntermediary"]`)
                //ibbank
            const bankTransferIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="bankTransferIntermediary"]`)
                //ibbankcountry
            const countryBankTransferIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="countryBankTransferIntermediary"]`)
                //ibbankcity
            const cityBankTransferIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="cityBankTransferIntermediary"]`)
                //ibbankaddress
            const bankAddressTransferIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="bankAddressTransferIntermediary"]`)
                //ibbankabaswiftiban


            const amountBsTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="amountBsTransfer"]`)
            const emailTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="emailTransfer"]`)
            const phoneTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="phoneTransfer"]`)
            const bankAddressTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="bankAddressTransfer"]`)
            const providerIntermediary = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="providerIntermediary"]`)

            const efectivoTransfer = document.getElementById(`efectivoTransfer`)
            const depositTransfer = document.getElementById(`depositTransfer`)



            let data = new FormData()
            amountTransfer.addEventListener('blur', () => {
                calculandoEnvioCamioMonto()
            })
            countryTransfer.addEventListener('change', () => {
                calculandoEnvioCamioMonto()
            })

            async function calculandoEnvioCamioMonto() {
                // if (amountTransfer.value && (countryTransfer.options[countryTransfer.selectedIndex].value !== "Seleccione") ) {
                //     // Todo: validar campos
                //     let formData = new FormData()
                //     formData.append("cond", "calcsendenvio");
                //     formData.append("amountTransfer", amountTransfer.value);
                //     formData.append("countryTransfer", countryTransfer.options[countryTransfer.selectedIndex].value);

                //     // Cargando spinner
                //     modal.openModal('loader')

                //     let data = await fetch("ajax.php", { method: 'POST', body: formData });
                //     let res = await data.json();

                //     // LLenamos los campos correspondientes
                //     if (res.code === "0000") {
                //         amountBsTransfer.value = numberFormater(res.totalves)
                //         exchangeRateTransfer.value = numberFormater(res.usdrate)
                //     } else {
                //         // Mostramos alerta de errore
                //         console.log('problems');
                //     }

                //     modal.closeModal('loader')
                // }
            }
            // -tasa de cambio y monto se llenan cuando (proveedor, pais, monto) sean completados
            ///falta modificar


            paidFormTransfer.addEventListener('change', () => {
                // Mostramos boton de enviar
                let valueSelected = paidFormTransfer.options[paidFormTransfer.selectedIndex].value;
                const accountDeposit = document.getElementById(`accountDeposit`)
                const cash = document.getElementById(`cash`)
                    /*
                    1 = Efectivo 
                    2 = Billetera
                    3 = Depósito en Cuenta
                    */

                if (valueSelected === "1") {
                    beneficiarioTransfer.classList.remove('hidden')
                    cash.classList.remove('hidden')

                    // Poner hidden los demas                
                    accountDeposit.classList.add('hidden')
                } else if (valueSelected === "2") {
                    beneficiarioTransfer.classList.remove('hidden')

                    // Poner hidden los demas
                    accountDeposit.classList.add('hidden')
                    cash.classList.add('hidden')
                } else if (valueSelected === "3") {
                    beneficiarioTransfer.classList.remove('hidden')
                    accountDeposit.classList.remove('hidden')

                    // Poner hidden los demas
                    cash.classList.add('hidden')
                }
            })
        }
    })
}