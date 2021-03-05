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
       xpresentationLayer::buildOptionGrid("Compra Divisa");
       xpresentationLayer::endSection();
       xpresentationLayer::startForm("compraForm");

       xpresentationLayer::startSectionTwoColumns();
       xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0.00");

       $data_json = $serviceCall->mgetcurrencyl();
       xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "");
       
       $data_json = $serviceCall->mgetcreditinstrumentl();
       xpresentationLayer::buildSelectJson("Abonar en", "payIn", "payIn", $data_json, "", "");
       $data_json = $serviceCall->mgetdebitinstrumentl();
       xpresentationLayer::buildSelectJson("Forma de Pago", "payForm", "payForm", $data_json, "", "");
       xpresentationLayer::buildSelectJson("Cuentas Bancarias Receptoras", "accountBanks", "accountBanks", "", "", "", "grid-item-2", "select-large");
       xpresentationLayer::endSection();
       xpresentationLayer::buildSectionPin();
       xpresentationLayer::endMain();
       
       include './modals/loader.php';
       include './modals/operationSummary.php';
       include './modals/modalOtpVerification.php';
       include './modals/modalSuccess.php';
       include './modals/modalWrong.php';

       xpresentationLayer::buildFooterXatoxi();
       xpresentationLayer::endForm();

       xpresentationLayer::endSection();
       xpresentationLayer::endHtml();

