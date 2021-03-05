<?php

        include_once("xpresentationlayer.php");
        xpresentationLayer:: startHtml("esp");
        xpresentationLayer:: buildHead("Xatoxi");
        xpresentationLayer:: buildHeaderPrincipalXatoxi();


        xpresentationLayer::startMain();
        

        xpresentationLayer::startInputModal();
        xpresentationLayer::buildPinPrincipalModal("PIN", 4, 4, "dataPin()");
        xpresentationLayer::endInputModal();

        xpresentationLayer::startSectionTwoColumns();        
        xpresentationLayer::buildMenuOptionGrid("envio.png","ENVIO", true, "envio.php");
        xpresentationLayer::buildMenuOptionGrid("recepcion.png","RECEPCION", true, "recepcion.php");
        xpresentationLayer::buildMenuOptionGrid("venta.png","VENTA", true, "venta.php");
        xpresentationLayer::buildMenuOptionGrid("compra.png","COMPRA", true, "compra.php");
        xpresentationLayer::buildMenuOptionGrid("cambio.png","CAMBIO", true, "cambio.php");
        xpresentationLayer::buildMenuOptionGrid("images.png","PERFIL", true, "perfil.php");
        //xpresentationLayer::buildMenuOptionComplete("images.png","PERFIL", true);  
        xpresentationLayer::endSection();   

        xpresentationLayer::endMain();

        xpresentationLayer::buildFooterXatoxi();
        xpresentationLayer:: endHtml();
?>