<?php
        error_reporting(0);
        include_once("xpresentationlayer.php");        
        include_once("xclient.php");
        $serviceCall = new xclient("");

        xpresentationLayer::startHtml("esp");
        xpresentationLayer::buildHead("Xatoxi");
        xpresentationLayer::buildHeaderXatoxi();


        xpresentationLayer::startMain();

        xpresentationLayer::startForm("idForm");
        xpresentationLayer::startAsideOneColumn();        
        xpresentationLayer::buildInputMedium("Usuario", "user", "user", "");
        xpresentationLayer::buildInputMedium("Email", "email", "email", "Ejemplo@gmail.com");

        $data_jsonAreaPhone = $serviceCall->mgetallcountrydetaill();
        $data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
        //print_r($data_json);
        xpresentationLayer::buildPhoneComplete("Movil", "codeCountry", "codeArea",  "phone", "codeCountry", "codeArea",  "phone", $data_jsonAreaPhone, $data_jsonCodePhone, "selectValorforId('codeCountry/codeArea', 'ajax.php?cond=mgetcellphoneareacodel')");
        xpresentationLayer::buildButtonCenter("Aceptar");
        xpresentationLayer::endAside();
        xpresentationLayer::endForm();

        xpresentationLayer::endMain();
        
        xpresentationLayer::buildFooterXatoxi();

        xpresentationLayer::endSection();
        xpresentationLayer:: endHtml();
?>