<?php
include_once("xclient.php");
include_once("util.php");
$client = new xclient("");
$util = new Util;
session_start();

//Se llama al servicio para llenar el select hijo
if (isset($_GET["cond"])) {
    if ($_GET["cond"] == "mgetproviderl") {
        $data_json = $client->mgetproviderl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcellphoneareacodel") {

        $data_json = $client->mgetcellphoneareacodel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencysrcl") {
        $data_json = $client->mgetcurrencysrcl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetinstrumentdstl") {
        $data_json = $client->mgetinstrumentdstl($_GET["valor0"], $_GET["valor1"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencydstl") {
        $data_json = $client->mgetcurrencydstl($_GET["valor0"], $_GET["valor1"], $_GET["valor2"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetremitancetypel") {
        $data_json = $client->mgetremitancetypel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mcalcsend") {
        $data_json = $client->mcalcsend(1, $_GET["valor0"], $_GET["valor1"], $_GET["valor2"]);
        print_r(json_encode($data_json));
    }
}

if (isset($_POST["cond"])) {
    if (isset($_POST["newRegister"])) {
        $user = $_POST["User"];
        $email = $_POST["Email"];
        $phone = $_POST["CodeCountry"] . $_POST["codeArea"] . $_POST["Phone"];


        $data_json = $client->maddlead("", $user, "", $email, "", $phone, "", "", "", "", "", "");
        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "AuthPin") {
        $pin = $_POST["pin"];
        $tag = $_POST["tag"];
        $data_json = $client->mauth("lenovi", "04242337645", $pin);

        // echo gettype($data_json);
        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "addEntrust") {
    }

    if ($_POST["cond"] == "calcsendw") {
        $data_json = $client->mcalcsendw(1, $_POST['amountWallet'], $_POST['currencyWallet']);

        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "genotp") {
        $dataGenOTP = $client->mgenotp(1);

        echo json_encode($dataGenOTP);
    }

    if ($_POST["cond"] == "calcsendenvio") {
        $data_json = $client->mcalcsend(1, $_POST["providerCommend"], $_POST["countryCommend"], $_POST["amountCommend"]);

        echo json_encode($data_json);
    }

    // Encomienda
    if ($_POST["cond"] == "addEnvio") {
        $data_json = $client->mexecsendw("1", $_POST['users'], $_POST['amountWallet'], $_POST['currencyWallet']);
        echo json_encode($data_json);
    }

    // Encomienda - Billetera
    if ($_POST["cond"] == "commendWallet") {
        $idCountry = isset($_POST['countryCommend']) ? $util->testInput($_POST['countryCommend']) : "";
        $idprovider = isset($_POST['providerCommend']) ? $util->testInput($_POST['providerCommend']) : "";
        $amount = isset($_POST['amountCommend']) ? $util->testInput($_POST['amountCommend']) : "";
        $idremitancetype = isset($_POST['sendFormCommend']) ? $util->testInput($_POST['sendFormCommend']) : "";
        $idcurrency = isset($_POST['currencyCommend']) ? $util->testInput($_POST['currencyCommend']) : "";
        $idclearencetype = isset($_POST['paidFormCommend']) ? $util->testInput($_POST['paidFormCommend']) : "";

        $acc = isset($_POST['receiveAccount']) ? $util->testInput($_POST['receiveAccount']) : "";
        $reference = isset($_POST['referenceCommendCuenta']) ? $util->testInput($_POST['referenceCommendCuenta']) : "";

        $bfirstname = isset($_POST['firstNameCommend']) ? $util->testInput($_POST['firstNameCommend']) : "";
        $bmiddlename = isset($_POST['secondNameCommend']) ? $util->testInput($_POST['secondNameCommend']) : "";
        $blastname = isset($_POST['firstSurnameCommend']) ? $util->testInput($_POST['firstSurnameCommend']) : "";
        $bsecondlastaname = isset($_POST['secondSurnameCommend']) ? $util->testInput($_POST['secondSurnameCommend']) : "";
        $bbank = isset($_POST['bankCommend']) ? $util->testInput($_POST['bankCommend']) : "";
        $bacc = isset($_POST['accountCommend']) ? $util->testInput($_POST['accountCommend']) : "";
        $bdocumentid = isset($_POST['bdocumentid']) ? $util->testInput($_POST['bdocumentid']) : "";

        $data_json = $client->mexecsend(41, $idCountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc);

        echo json_encode($data_json);
    }

    if ($_POST["cond"] == "calcsend") {
        $idprovider = $_POST["providerCommend"];
        $idcountry = $_POST["countryCommend"];
        $amount = $_POST["amountCommend"];

        $data_json = $client->mcalcsend(1, $idprovider, $idcountry, $amount);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcsendtr") {
        $data_json = $client->mcalcsendtr(1, $_POST["countryTransfer"], $_POST["currencyTransfer"],  $_POST["amountTransfer"]);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "getcompliancedoctypel") {
        $data_json = $client->mgetcompliancedoctypel();
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "calcsell") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];

        $data_json = $client->mcalcbuy(1, $currency, $amount);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "execsell") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $otp = $_POST["otp"];
        $idinstrumentcredit = $_POST["payForm"];
        $idinstrumentdebit = $_POST["payIn"];

        $data_json = $client->mexexcbuy(1, $currency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit);

        print_r(json_encode($data_json));
    }
    
    if ($_POST["cond"] == "calcbuy") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        
        $data_json = $client->mcalcsell(1, $currency, $amount);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "execbuy") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $otp = $_POST["otp"];
        $idinstrumentcredit = $_POST["payForm"];
        $idclearencetype = $_POST["payIn"];
        $accountBanks = $_POST["accountBanks"] || "010220202020202";

        $data_json = $client->mexecsell(1, $currency, $amount, $otp, $idinstrumentcredit, $idclearencetype, $accountBanks);

        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "calcexchange") {
        $idinstrumentsrc = $_POST["paidMethod"];
        $idinstrumentdst = $_POST["recieveMethod"];

        $idcurrencysrc = $_POST["sendCurrency"];
        $idcurrencydst = $_POST["recieveCurrency"];
        
        $amount = $_POST["amount"];
        $bank = $_POST["bank"];
        $reference = $_POST["reference"];
        $routing = $_POST["routing"];

        $data_json = $client->mcalcexchange(1, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing);

        print_r(json_encode($data_json));
    }
}
