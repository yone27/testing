<?php
        error_reporting(0);
        include_once("xpresentationlayer.php");
        include_once("xclient.php");
        $serviceCall = new xclient("");
        xpresentationLayer:: startHtml("esp");
        xpresentationLayer:: buildHead("Xatoxi");
        xpresentationLayer:: buildHeaderXatoxi();


        xpresentationLayer::startMain();
        xpresentationLayer::startFirtsSection();
        xpresentationLayer::buildOptionGrid("Recepción Remesas");
        xpresentationLayer::endSection();

        xpresentationLayer::startSectionTwoColumns();
        xpresentationLayer::buildInputTextGrid("Clave Remesa", "remittances", "remittances", "");
        $data_json = $serviceCall->mgetclearencetypel();
        xpresentationLayer::buildSelectJson("Forma Recepción", "formRecepcion", "formRecepcion", $data_json, "", "");
        //Cambiar en bs
        xpresentationLayer::buildInputTextGrid("Cuenta Bancaria", "bankAccount", "bankAccount", "", 20);
        //Retirar en efectivo
        $data_json = $serviceCall->mgetlocationl();
        xpresentationLayer::buildSelectJson("Sucursales", "branchOffices", "branchOffices", $data_json, "", "", "grid-item-2","select-large");
        xpresentationLayer::endSection();        

        xpresentationLayer::buildSectionPin();   
        xpresentationLayer::endMain();

        xpresentationLayer::buildFooterXatoxi();

        xpresentationLayer::endSection();
        xpresentationLayer:: endHtml();
