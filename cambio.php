<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();
xpresentationLayer::buildOptionGrid("Cambio");
xpresentationLayer::endSection();
xpresentationLayer::startForm("cambioForm");

xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0,00");
xpresentationLayer::startSectionTwoColumns();

$data_json = $serviceCall->mgetinstrumentsrcl();
xpresentationLayer::buildSelectJson("Entrego", "paidMethod", "paidMethod", $data_json, "", "selectValorforId('paidMethod/sendCurrency', 'ajax.php?cond=mgetcurrencysrcl')");


xpresentationLayer::buildSelectJson("Entrego Divisa", "sendCurrency", "sendCurrency", "", "", "selectValorforId('paidMethod/sendCurrency/recieveMethod', 'ajax.php?cond=mgetinstrumentdstl')");

xpresentationLayer::buildSelectJson("Recibo", "recieveMethod", "recieveMethod", "", "", "selectValorforId('paidMethod/sendCurrency/recieveMethod/recieveCurrency', 'ajax.php?cond=mgetcurrencydstl')");
xpresentationLayer::buildSelectJson("Recibo Divisa", "recieveCurrency", "recieveCurrency", "");
xpresentationLayer::buildInputTextGrid("Banco", "bank", "bank", "");
xpresentationLayer::buildInputTextGrid("Nro. Referencia", "reference", "reference", "", 10);
xpresentationLayer::buildInputTextGrid("Routing", "routing", "routing", "");

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin();
xpresentationLayer::endMain();

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endForm();

xpresentationLayer::endSection();
       
include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::endHtml();
