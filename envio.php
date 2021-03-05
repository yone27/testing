<?php

error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");

$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();
xpresentationLayer::startMain();

xpresentationLayer::startSectionOpt("grid-2","item-container");
xpresentationLayer::buildOptionsPrincipal("Billetera", "Billetera");
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Encomienda");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Billetera", "Billetera");
xpresentationLayer::buildOptionGrid("Encomienda", "Encomienda");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia");
xpresentationLayer::endSection();
xpresentationLayer::startContentSection();

// Billetera
xpresentationLayer::startContentofOption("Billetera");
xpresentationLayer::startForm("billeteraForm");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("MONTO", "amountWallet", "amountWallet", "0.00");

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyWallet", "currencyWallet", $data_json, "", "");
xpresentationLayer::endSection();
$data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::startDivHidden("beneficiarioWallet");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersWallet("users", "users", $data_json, "", "", "", "");
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("billetera");
xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Billetera

//Comienzo seccion Encomienda
xpresentationLayer::startContentofOption("Encomienda");
xpresentationLayer::startForm("encomiendaForm");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amountCommend", "amountCommend", "0.00", "");
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryCommend", "countryCommend", $data_json, "", "selectValorforId('countryCommend/providerCommend', 'ajax.php?cond=mgetproviderl')");
xpresentationLayer::buildSelectJson("Proveedor", "providerCommend", "providerCommend", "", "", "selectValorforId('providerCommend/sendFormCommend', 'ajax.php?cond=mgetremitancetypel')");
$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyCommend", "currencyCommend", $data_json, "", "");
xpresentationLayer::buildSelectJson("Entrega", "sendFormCommend", "sendFormCommend", "");
$data_json = $serviceCall->mgetclearencetypel();
?>
<!-- <select name="paidFormCommend" id="paidFormCommend" class="select-width">
    <option disabled="" selected="">Seleccione</option>
    <option value="2">Billetera </option>
    <option value="3">Depósito en Cuenta </option>
    <option value="1">Efectivo </option>
</select> -->
<?php
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormCommend", "paidFormCommend", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "exchangeRateCommend", "exchangeRateCommend", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "amountBsCommend", "amountBsCommend", "0.00", "", "", "", true);
xpresentationLayer::endSection();
xpresentationLayer::startDivHidden("efectivoCommend");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceCommend", "referenceCommend", "0");
xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("depositCommend");
xpresentationLayer::startSectionTwoColumns();

$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "receiveAccount", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceCommendCuenta", "referenceCommendCuenta", "");

xpresentationLayer::endSection();

xpresentationLayer::endDiv();

xpresentationLayer::startDivHidden("uploadCommend");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputFileDoc("Documento Identificación", "fileDocument", "", "", "", "");
xpresentationLayer::endSection();

xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("beneficiarioCommend");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend("usersCommend", "usersCommend", "btnAddWallet", "");
xpresentationLayer::startDivHidden("userCommend");
xpresentationLayer::buildInputTextGrid("Documento Identificación", "bdocumentid", "bdocumentid", "", "", "marginSect", "required");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameCommend", "firstNameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameCommend", "secondNameCommend", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameCommend", "firstSurnameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameCommend", "secondSurnameCommend", "");
xpresentationLayer::buildInputTextGrid("Direccion", "addressCommend", "addressCommend", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailCommend", "emailCommend", "Ejemplo@mail.com");
xpresentationLayer::buildInputNumberGrid("Telefono", "phoneCommend", "phoneCommend", "", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankCommend", "bankCommend", "", "");
xpresentationLayer::buildInputNumberGrid("Cuenta", "accountCommend", "accountCommend", "");

xpresentationLayer::endSection();
xpresentationLayer::buildButtonCenter("Aceptar", "", "addContact");
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();
xpresentationLayer::buildSectionPin("encomienda");
xpresentationLayer::endForm();
xpresentationLayer::endDiv();

//Fin seccion de Encomienda

//Comiendo seccion Transferencia
xpresentationLayer::startContentofOption("Transferencia");
xpresentationLayer::startForm("transferenciaForm");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amountTransfer", "amountTransfer", "0.00", "");
//$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryTransfer", "countryTransfer", $data_json);
//$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson("Moneda", "currencyTransfer", "currencyTransfer", $data_json, "", "");
//$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormTransfer", "paidFormTransfer", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "exchangedRateTransfer", "exchangedRateTransfer", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "amountBsTransfer", "amountBsTransfer", "0.00", "", "", "", true);
xpresentationLayer::endSection();
//Deposito en cuenta
xpresentationLayer::startDivHidden("accountDeposit");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receivingAccount", "receivingAccount", $data_json, "", " ");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferDeposit", "referenceTransferDeposit", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
//Efectivo
xpresentationLayer::startDivHidden("cash");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferCash", "referenceTransferCash", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::startDivHidden("beneficiarioTransfer");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend("usersTransfer", "usersTransfer", "btnIconAdd", "");
xpresentationLayer::startDivHidden("userTransfer");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameTransfer", "firstNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Segund  o nombre", "secondNameTransfer", "secondNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameTransfer", "firstSurnameTransfer", "");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameTransfer", "secondSurnameTransfer", "");
xpresentationLayer::buildInputTextGrid("Direccion", "addressTransfer", "addressTransfer", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailTransfer", "emailTransfer", "Ejemplo@mail.com");
xpresentationLayer::buildInputTextGrid("Telefono", "phoneTransfer", "phoneTransfer", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankTransfer", "bankTransfer", "", "");
xpresentationLayer::buildInputTextGrid("Cuenta", "accountTransfer", "accountTransfer", "");
xpresentationLayer::buildInputTextGrid("Pais Banco", "countryBankTransfer", "countryBankTransfer", "", "");
xpresentationLayer::buildInputTextGrid("Ciudad Banco", "cityBankTransfer", "cityBankTransfer", "");
xpresentationLayer::buildInputTextGrid("Direccion Banco", "bankAddressTransfer", "bankAddressTransfer", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN", "abaSwiftIban", "abaSwiftIban", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Banco Intermediario", "bankTransferIntermediary", "bankTransferIntermediary", "", "");
xpresentationLayer::buildInputTextGrid("Cuenta Intermediario", "accountTransferIntermediary", "accountTransferIntermediary", "");
xpresentationLayer::buildInputTextGrid("Pais Intermediario", "countryBankTransferIntermediary", "countryBankTransferIntermediary", "", "");
xpresentationLayer::buildInputTextGrid("Ciudad Intermediario", "cityBankTransferIntermediary", "cityBankTransferIntermediary", "");
xpresentationLayer::buildInputTextGrid("Direccion Banco Intermediario", "bankAddressTransferIntermediary", "bankAddressTransferIntermediary", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN Intermediario", "abaSwiftIbanIntermediary", "abaSwiftIbanIntermediary", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::endSection();
xpresentationLayer::buildButtonCenter("Aceptar");
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();
xpresentationLayer::buildSectionPin("transferencia");
xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Fin seccion de Transferencia

xpresentationLayer::endDiv();
xpresentationLayer::endDiv();
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalEncomienda.php';
include './modals/modalWrong.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endSection();
xpresentationLayer::endHtml();
