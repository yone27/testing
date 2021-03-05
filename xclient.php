<?php

class xclient
{

	private $client;

	private function init($url)
	{
		$this->client = curl_init($url);
		$h1 = "Cache-Control: no-cache";
		$h2 = "Content-Type: application/json";
		curl_setopt($this->client, CURLOPT_HTTPHEADER, array($h1, $h2));
		curl_setopt($this->client, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->client, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($this->client, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->client, CURLOPT_SSL_VERIFYPEER, 0);
	} // init

	private function updateField(&$arr, $field, $val)
	{
		if ($val != "") {
			$arr[$field] = $val;
		}
	} // updateField

	private function updateFieldArr(&$arr, $field, $val)
	{
		if (is_array($val) != "") {
			$arr[$field] = $val;
		}
	} // updateFieldArr



	private function bgetproviderl($wsuser, $wspwd, $idcountry = "")
	{
		$this->updateField($getproviderl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getproviderl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getproviderl, "idcountry", $idcountry);
		return $getproviderl;
	} // bgetproviderl



	function mgetproviderl(
		$idcountry,
		$url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php"
	) {
		$this->init($url);
		$getproviderl =  $this->bgetproviderl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idcountry);
		$data["getproviderl"] = $getproviderl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} //mgetproviderl

	private function bgetcountryl($wsuser, $wspwd)
	{
		$this->updateField($getcountryl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcountryl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcountryl;
	} // bgetcountryl

	function mgetcountryl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcountryl =  $this->bgetcountryl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcountryl"] = $getcountryl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcountryl

	private function baddlead($wsuser, $wspwd, $code, $name, $idparty, $email, $imei, $phoneNumber, $observation, $pin, $date, $pinfirstTime, $active, $deleted)
	{
		$this->updateField($addlead, "wsuser", "WSITALCAMBIO");
		$this->updateField($addlead, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($addlead, "code", $code);
		$this->updateField($addlead, "name", $name);
		$this->updateField($addlead, "idparty", $idparty);
		$this->updateField($addlead, "email", $email);
		$this->updateField($addlead, "imei", $imei);
		$this->updateField($addlead, "phonenumber", $phoneNumber);
		$this->updateField($addlead, "observation", $observation);
		$this->updateField($addlead, "pin", $pin);
		$this->updateField($addlead, "date", $date);
		$this->updateField($addlead, "pinfirsttime", $pinfirstTime);
		$this->updateField($addlead, "active", $active);
		$this->updateField($addlead, "deleted", $deleted);
		return $addlead;
	} // baddlead

	function maddlead($code, $name, $idparty, $email, $imei, $phoneNumber, $observation, $pin, $date, $pinfirstTime, $active, $deleted, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$addlead =  $this->baddlead("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $code, $name, $idparty, $email, $imei, $phoneNumber, $observation, $pin, $date, $pinfirstTime, $active, $deleted);
		$data["addlead"] = $addlead;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // maddlead

	private function bgenpin($wsuser, $wspwd)
	{
		$this->updateField($genpin, "wsuser", "WSITALCAMBIO");
		$this->updateField($genpin, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $genpin;
	} // bgenpin

	function mgenpin($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$genpin =  $this->bgenpin("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["genpin"] = $genpin;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgenpin


	private function bgenotp($wsuser, $wspwd, $idlead)
	{
		$this->updateField($genotp, "wsuser", "WSITALCAMBIO");
		$this->updateField($genotp, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($genotp, "idlead", $idlead);
		return $genotp;
	} // bgenotp

	function mgenotp($idlead, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$genotp = $this->bgenotp("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead);
		$data["genotp"] = $genotp;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgenotp

	private function bupdpin($wsuser, $wspwd, $name, $phoneNumber, $pin)
	{
		$this->updateField($updpin, "wsuser", "WSITALCAMBIO");
		$this->updateField($updpin, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($updpin, "name", $name);
		$this->updateField($updpin, "phonenumber", $phoneNumber);
		$this->updateField($updpin, "pin", $pin);
		return $updpin;
	} // bupdpin

	function mupdpin($name, $phoneNumber, $pin, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$updpin =  $this->bupdpin("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $name, $phoneNumber, $pin);
		$data["updpin"] = $updpin;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mupdpin

	private function bauth($wsuser, $wspwd, $name, $phoneNumber, $pin)
	{
		$this->updateField($auth, "wsuser", "WSITALCAMBIO");
		$this->updateField($auth, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($auth, "name", $name);
		$this->updateField($auth, "phonenumber", $phoneNumber);
		$this->updateField($auth, "pin", $pin);
		return $auth;
	} // bauth

	function mauth($name, $phoneNumber, $pin, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$auth =  $this->bauth("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $name, $phoneNumber, $pin);
		$data["auth"] = $auth;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mauth

	private function bgeticccbankl($wsuser, $wspwd)
	{
		$this->updateField($geticccbankl, "wsuser", "WSITALCAMBIO");
		$this->updateField($geticccbankl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $geticccbankl;
	} // bgeticccbankl

	function mgeticccbankl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$geticccbankl =  $this->bgeticccbankl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["geticccbankl"] = $geticccbankl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgeticccbankl

	private function bcalcsend($wsuser, $wspwd, $idlead, $idProvider, $idCountry, $amount)
	{
		$this->updateField($calcsend, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcsend, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcsend, "idlead", $idlead);
		$this->updateField($calcsend, "idprovider", $idProvider);
		$this->updateField($calcsend, "idcountry", $idCountry);
		$this->updateField($calcsend, "amount", $amount);
		return $calcsend;
	} // bcalcsend

	function mcalcsend($idlead, $idProvider, $idCountry, $amount, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcsend =  $this->bcalcsend("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idProvider, $idCountry, $amount);
		$data["calcsend"] = $calcsend;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcsend

	private function bgetcurrencyl($wsuser, $wspwd)
	{
		$this->updateField($getcurrencyl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcurrencyl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcurrencyl;
	} // bgetcurrencyl

	function mgetcurrencyl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcurrencyl =  $this->bgetcurrencyl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcurrencyl"] = $getcurrencyl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcurrencyl

	private function bcalcsell($wsuser, $wspwd, $idlead, $idCurrency, $amount)
	{
		$this->updateField($calcsell, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcsell, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcsell, "idlead", $idlead);
		$this->updateField($calcsell, "idcurrency", $idCurrency);
		$this->updateField($calcsell, "amount", $amount);
		return $calcsell;
	} // bcalcsell

	function mcalcsell($idlead, $idCurrency, $amount, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcsell =  $this->bcalcsell("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idCurrency, $amount);
		$data["calcsell"] = $calcsell;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcsell

	private function bcalcbuy($wsuser, $wspwd, $idlead, $idCurrency, $amount)
	{
		$this->updateField($calcbuy, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcbuy, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcbuy, "idlead", $idlead);
		$this->updateField($calcbuy, "idcurrency", $idCurrency);
		$this->updateField($calcbuy, "amount", $amount);
		return $calcbuy;
	} // bcalcbuy

	function mcalcbuy($idlead, $idCurrency, $amount, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcbuy =  $this->bcalcbuy("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idCurrency, $amount);
		$data["calcbuy"] = $calcbuy;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcbuy

	private function bgetallcountrydetaill($wsuser, $wspwd)
	{
		$this->updateField($getallcountrydetaill, "wsuser", "WSITALCAMBIO");
		$this->updateField($getallcountrydetaill, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getallcountrydetaill;
	} // bgetallcountrydetaill

	function mgetallcountrydetaill($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getallcountrydetaill =  $this->bgetallcountrydetaill("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getallcountrydetaill"] = $getallcountrydetaill;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetallcountrydetaill

	private function bgetcellphoneareacodel($wsuser, $wspwd, $countrycode)
	{
		$this->updateField($getcellphoneareacodel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcellphoneareacodel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getcellphoneareacodel, "countrycode", $countrycode);
		return $getcellphoneareacodel;
	} // bgetcellphoneareacodel

	function mgetcellphoneareacodel($countrycode, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcellphoneareacodel =  $this->bgetcellphoneareacodel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $countrycode);
		$data["getcellphoneareacodel"] = $getcellphoneareacodel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcellphoneareacodel

	private function bfindlead($wsuser, $wspwd, $key)
	{
		$this->updateField($findlead, "wsuser", "WSITALCAMBIO");
		$this->updateField($findlead, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($findlead, "key", $key);
		return $findlead;
	} // bfindlead

	function mfindlead($key, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$findlead =  $this->bfindlead("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $key);
		$data["findlead"] = $findlead;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mfindlead

	private function bsendemail($wsuser, $wspwd, $subject, $to, $header, $body, $footer)
	{
		$this->updateField($sendemail, "wsuser", "WSITALCAMBIO");
		$this->updateField($sendemail, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($sendemail, "subject", $subject);
		$this->updateField($sendemail, "to", $to);
		$this->updateField($sendemail, "header", $header);
		$this->updateField($sendemail, "body", $body);
		$this->updateField($sendemail, "footer", $footer);
		return $sendemail;
	} // bsendemail

	function msendemail($subject, $to, $header, $body, $footer, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$sendemail =  $this->bsendemail("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $subject, $to, $header, $body, $footer);
		$data["sendemail"] = $sendemail;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // msendemail

	private function bleadtoparty($wsuser, $wspwd, $idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress)
	{
		$this->updateField($leadtoparty, "wsuser", "WSITALCAMBIO");
		$this->updateField($leadtoparty, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($leadtoparty, "idlead", $idlead);
		$this->updateField($leadtoparty, "firstname", $firstname);
		$this->updateField($leadtoparty, "middlename", $middlename);
		$this->updateField($leadtoparty, "lastname", $lastname);
		$this->updateField($leadtoparty, "secondlastname", $secondlastname);
		$this->updateField($leadtoparty, "documentid", $documentid);
		$this->updateField($leadtoparty, "phonecountrycode", $phonecountrycode);
		$this->updateField($leadtoparty, "phoneareacode", $phoneareacode);
		$this->updateField($leadtoparty, "phonenumber", $phonenumber);
		$this->updateField($leadtoparty, "email", $email);
		$this->updateField($leadtoparty, "bankaccount", $bankaccount);
		$this->updateField($leadtoparty, "birthdate", $birthdate);
		$this->updateField($leadtoparty, "fulladdress", $fulladdress);
		return $leadtoparty;
	} // bleadtoparty

	function mleadtoparty($idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$leadtoparty =  $this->bleadtoparty("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress);
		$data["leadtoparty"] = $leadtoparty;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mleadtoparty

	private function bisparty($wsuser, $wspwd, $idlead)
	{
		$this->updateField($isparty, "wsuser", "WSITALCAMBIO");
		$this->updateField($isparty, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($isparty, "idlead", $idlead);
		return $isparty;
	} // bisparty

	function misparty($idlead, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$isparty =  $this->bisparty("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead);
		$data["isparty"] = $isparty;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // misparty

	private function bgetparty($wsuser, $wspwd, $idlead, $idparty)
	{
		$this->updateField($getparty, "wsuser", "WSITALCAMBIO");
		$this->updateField($getparty, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getparty, "idlead", $idlead);
		$this->updateField($getparty, "idlead", $idparty);
		return $getparty;
	} // bgetparty

	function mgetparty($idlead, $idparty, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getparty =  $this->bgetparty("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idparty);
		$data["getparty"] = $getparty;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetparty

	private function brecv($wsuser, $wspwd, $idparty, $acc, $key, $addr, $bdate)
	{
		$this->updateField($recv, "wsuser", "WSITALCAMBIO");
		$this->updateField($recv, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($recv, "idparty", $idparty);
		$this->updateField($recv, "acc", $acc);
		$this->updateField($recv, "key", $key);
		$this->updateField($recv, "addr", $addr);
		$this->updateField($recv, "bdate", $bdate);
		return $recv;
	} // brecv

	function mrecv($idparty, $acc, $key, $addr, $bdate, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$recv =  $this->brecv("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idparty, $acc, $key, $addr, $bdate);
		$data["recv"] = $recv;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mrecv

	private function bgetclearencetypel($wsuser, $wspwd)
	{
		$this->updateField($getclearencetypel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getclearencetypel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getclearencetypel;
	} // bgetclearencetypel

	function mgetclearencetypel($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getclearencetypel =  $this->bgetclearencetypel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getclearencetypel"] = $getclearencetypel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetclearencetypel

	private function bgetremitancetypel($wsuser, $wspwd, $idprovider)
	{
		$this->updateField($getremitancetypel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getremitancetypel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getremitancetypel, "idprovider", $idprovider);
		return $getremitancetypel;
	} // bgetremitancetypel

	function mgetremitancetypel($idprovider, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getremitancetypel =  $this->bgetremitancetypel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idprovider);
		$data["getremitancetypel"] = $getremitancetypel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetremitancetypel

	private function bgetcurrencyremitancel($wsuser, $wspwd)
	{
		$this->updateField($getcurrencyremitancel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcurrencyremitancel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcurrencyremitancel;
	} // bgetcurrencyremitancel

	function mgetcurrencyremitancel($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcurrencyremitancel =  $this->bgetcurrencyremitancel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcurrencyremitancel"] = $getcurrencyremitancel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcurrencyremitancel

	private function bgetdebitinstrumentl($wsuser, $wspwd)
	{
		$this->updateField($getdebitinstrumentl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getdebitinstrumentl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getdebitinstrumentl;
	} // bgetdebitinstrumentl

	function mgetdebitinstrumentl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getdebitinstrumentl =  $this->bgetdebitinstrumentl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getdebitinstrumentl"] = $getdebitinstrumentl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetdebitinstrumentl

	private function bgetlocationl($wsuser, $wspwd)
	{
		$this->updateField($getlocationl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getlocationl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getlocationl;
	} // bgetlocationl

	function mgetlocationl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getlocationl =  $this->bgetlocationl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getlocationl"] = $getlocationl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetlocationl

	private function bgetiddocumenttypel($wsuser, $wspwd)
	{
		$this->updateField($getiddocumenttypel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getiddocumenttypel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getiddocumenttypel;
	} // bgetiddocumenttypel

	function mgetiddocumenttypel($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getiddocumenttypel =  $this->bgetiddocumenttypel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getiddocumenttypel"] = $getiddocumenttypel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetiddocumenttypel

	private function bendpoint($wsuser, $wspwd)
	{
		$this->updateField($endpoint, "wsuser", "WSITALCAMBIO");
		$this->updateField($endpoint, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $endpoint;
	} // bendpoint

	function mendpoint($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$endpoint =  $this->bendpoint("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["endpoint"] = $endpoint;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mendpoint

	private function bresetpin($wsuser, $wspwd, $imei)
	{
		$this->updateField($resetpin, "wsuser", "WSITALCAMBIO");
		$this->updateField($resetpin, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($resetpin, "imei", $imei);
		return $resetpin;
	} // bresetpin

	function mresetpin($imei, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$resetpin =  $this->bresetpin("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $imei);
		$data["resetpin"] = $resetpin;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mresetpin

	private function bgetinstrumentsrcl($wspwd, $imei)
	{
		$this->updateField($getinstrumentsrcl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getinstrumentsrcl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getinstrumentsrcl;
	} // bgetinstrumentsrcl

	function mgetinstrumentsrcl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getinstrumentsrcl =  $this->bgetinstrumentsrcl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getinstrumentsrcl"] = $getinstrumentsrcl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetinstrumentsrcl

	private function bgetcurrencysrcl($wsuser, $wspwd, $idinstrumentsrc)
	{
		$this->updateField($getcurrencysrcl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcurrencysrcl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getcurrencysrcl, "idinstrumentsrc", $idinstrumentsrc);
		return $getcurrencysrcl;
	} // bgetcurrencysrcl

	function mgetcurrencysrcl($idinstrumentsrc, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcurrencysrcl =  $this->bgetcurrencysrcl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idinstrumentsrc);
		$data["getcurrencysrcl"] = $getcurrencysrcl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcurrencysrcl

	private function bgetinstrumentdstl($wsuser, $wspwd, $idinstrumentsrc, $idcurrencysrc)
	{
		$this->updateField($getinstrumentdstl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getinstrumentdstl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getinstrumentdstl, "idinstrumentsrc", $idinstrumentsrc);
		$this->updateField($getinstrumentdstl, "idcurrencysrc", $idcurrencysrc);
		return $getinstrumentdstl;
	} // bgetinstrumentdstl

	function mgetinstrumentdstl($idinstrumentsrc, $idcurrencysrc, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getinstrumentdstl =  $this->bgetinstrumentdstl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idinstrumentsrc, $idcurrencysrc);
		$data["getinstrumentdstl"] = $getinstrumentdstl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetinstrumentdstl

	private function bgetcurrencydstl($wsuser, $wspwd, $idinstrumentsrc, $idcurrencysrc, $idinstrumentdst)
	{
		$this->updateField($getcurrencydstl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcurrencydstl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getcurrencydstl, "idinstrumentsrc", $idinstrumentsrc);
		$this->updateField($getcurrencydstl, "idcurrencysrc", $idcurrencysrc);
		$this->updateField($getcurrencydstl, "idinstrumentdst", $idinstrumentdst);
		return $getcurrencydstl;
	} // bgetcurrencydstl

	function mgetcurrencydstl($idinstrumentsrc, $idcurrencysrc, $idinstrumentdst, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcurrencydstl =  $this->bgetcurrencydstl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idinstrumentsrc, $idcurrencysrc, $idinstrumentdst);
		$data["getcurrencydstl"] = $getcurrencydstl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcurrencydstl

	private function bcalcexchange($wsuser, $wspwd, $idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing)
	{
		$this->updateField($calcexchange, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcexchange, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcexchange, "idlead", $idlead);
		$this->updateField($calcexchange, "idinstrumentsrc", $idinstrumentsrc);
		$this->updateField($calcexchange, "idinstrumentdst", $idinstrumentdst);
		$this->updateField($calcexchange, "idcurrencysrc", $idcurrencysrc);
		$this->updateField($calcexchange, "idcurrencydst", $idcurrencydst);
		$this->updateField($calcexchange, "amount", $amount);
		$this->updateField($calcexchange, "bank", $bank);
		$this->updateField($calcexchange, "numref", $numref);
		$this->updateField($calcexchange, "routing", $routing);
		return $calcexchange;
	} // bcalcexchange

	function mcalcexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcexchange =  $this->bcalcexchange("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing);
		$data["calcexchange"] = $calcexchange;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcexchange

	private function bgetcountrystatel($wsuser, $wspwd, $idcountry)
	{
		$this->updateField($getcountrystatel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcountrystatel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getcountrystatel, "idcountry", $idcountry);
		return $getcountrystatel;
	} // bgetcountrystatel

	function mgetcountrystatel($idcountry, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcountrystatel =  $this->bgetcountrystatel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idcountry);
		$data["getcountrystatel"] = $getcountrystatel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcountrystatel

	private function bgetstatecityl($wsuser, $wspwd, $idcountry)
	{
		$this->updateField($getstatecityl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getstatecityl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getstatecityl, "idstate", $idcountry);
		return $getstatecityl;
	} // bgetstatecityl

	function mgetstatecityl($idcountry, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getstatecityl =  $this->bgetstatecityl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idcountry);
		$data["getstatecityl"] = $getstatecityl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetstatecityl

	private function bcalcsendtr($wsuser, $wspwd, $idlead, $idcountry, $idcurrency, $amount)
	{
		$this->updateField($calcsendtr, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcsendtr, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcsendtr, "idlead", $idlead);
		$this->updateField($calcsendtr, "idcountry", $idcountry);
		$this->updateField($calcsendtr, "idcurrency", $idcurrency);
		$this->updateField($calcsendtr, "amount", $amount);
		return $calcsendtr;
	} // bcalcsendtr

	function mcalcsendtr($idlead, $idcountry, $idcurrency, $amount, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcsendtr =  $this->bcalcsendtr("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idcountry, $idcurrency, $amount);
		$data["calcsendtr"] = $calcsendtr;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcsendtr

	private function bgetcurrencytrl($wsuser, $wspwd)
	{
		$this->updateField($getcurrencytrl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcurrencytrl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcurrencytrl;
	} // bgetcurrencytrl

	function mgetcurrencytrl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcurrencytrl =  $this->bgetcurrencytrl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcurrencytrl"] = $getcurrencytrl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcurrencytrl

	private function bexecsell($wsuser, $wspwd, $idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc)
	{
		$this->updateField($execsell, "wsuser", "WSITALCAMBIO");
		$this->updateField($execsell, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($execsell, "idcurrency", $idcurrency);
		$this->updateField($execsell, "idlead", $idlead);
		$this->updateField($execsell, "amount", $amount);
		$this->updateField($execsell, "otp", $otp);
		$this->updateField($execsell, "idinstrumentdebit", $idinstrumentdebit);
		$this->updateField($execsell, "idclearencetype", $idclearencetype);
		$this->updateField($execsell, "acc", $acc);
		return $execsell;
	} // bexecsell

	function mexecsell($idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$execsell =  $this->bexecsell("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc);
		$data["execsell"] = $execsell;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mexecsell

	private function bexexcbuy($wsuser, $wspwd, $idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit)
	{
		$this->updateField($exexcbuy, "wsuser", "WSITALCAMBIO");
		$this->updateField($exexcbuy, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($exexcbuy, "idlead", $idlead);
		$this->updateField($exexcbuy, "idcurrency", $idcurrency);
		$this->updateField($exexcbuy, "amount", $amount);
		$this->updateField($exexcbuy, "otp", $otp);
		$this->updateField($exexcbuy, "idinstrumentcredit", $idinstrumentcredit);
		$this->updateField($exexcbuy, "idinstrumentdebit", $idinstrumentdebit);
		return $exexcbuy;
	} // bexexcbuy

	function mexexcbuy($idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$exexcbuy =  $this->bexexcbuy("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit);
		$data["execbuy"] = $exexcbuy;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mexexcbuy

	private function bexecsend($wsuser, $wspwd, $idlead, $idcountry, $idprovider, $otamountp, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc)
	{
		$this->updateField($execsend, "wsuser", "WSITALCAMBIO");
		$this->updateField($execsend, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($execsend, "idlead", $idlead);
		$this->updateField($execsend, "idcountry", $idcountry);
		$this->updateField($execsend, "idprovider", $idprovider);
		$this->updateField($execsend, "amount", $otamountp);
		$this->updateField($execsend, "idremitancetype", $idremitancetype);
		$this->updateField($execsend, "idcurrency", $idcurrency);
		$this->updateField($execsend, "idclearencetype", $idclearencetype);
		$this->updateField($execsend, "acc", $acc);
		$this->updateField($execsend, "reference", $reference);
		$this->updateField($execsend, "bdocumentid", $bdocumentid);
		$this->updateField($execsend, "bfirstname", $bfirstname);
		$this->updateField($execsend, "bmiddlename", $bmiddlename);
		$this->updateField($execsend, "blastname", $blastname);
		$this->updateField($execsend, "bsecondlastaname", $bsecondlastaname);
		$this->updateField($execsend, "bbank", $bbank);
		$this->updateField($execsend, "bacc", $bacc);
		return $execsend;
	} // bexecsend

	function mexecsend($idlead, $idcountry, $idprovider, $otamountp, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$execsend =  $this->bexecsend("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idcountry, $idprovider, $otamountp, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc);
		$data["execsend"] = $execsend;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mexecsend

	private function bgetpartyxl($wsuser, $wspwd)
	{
		$this->updateField($getpartyxl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getpartyxl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getpartyxl;
	} // bgetpartyxl

	function mgetpartyxl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getpartyxl =  $this->bgetpartyxl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getpartyxl"] = $getpartyxl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetpartyxl

	private function bfindpartyx($wsuser, $wspwd, $key)
	{
		$this->updateField($findpartyx, "wsuser", "WSITALCAMBIO");
		$this->updateField($findpartyx, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($findpartyx, "key", $key);
		return $findpartyx;
	} // bfindpartyx

	function mfindpartyx($key, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$findpartyx =  $this->bfindpartyx("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $key);
		$data["findpartyx"] = $findpartyx;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mfindpartyx

	private function bgetbankl($wsuser, $wspwd, $idcountry)
	{
		$this->updateField($getbankl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getbankl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getbankl, "idcountry", $idcountry);
		return $getbankl;
	} // bgetbankl

	function mgetbankl($idcountry, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getbankl =  $this->bgetbankl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idcountry);
		$data["getbankl"] = $getbankl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetbankl

	private function bcalcsendw($wsuser, $wspwd, $idlead, $amount, $idcurrency)
	{
		$this->updateField($calcsendw, "wsuser", "WSITALCAMBIO");
		$this->updateField($calcsendw, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($calcsendw, "idlead", $idlead);
		$this->updateField($calcsendw, "amount", $amount);
		$this->updateField($calcsendw, "idcurrency", $idcurrency);
		return $calcsendw;
	} // bcalcsendw

	function mcalcsendw($idlead, $amount, $idcurrency, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$calcsendw =  $this->bcalcsendw("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $amount, $idcurrency);
		$data["calcsendw"] = $calcsendw;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mcalcsendw

	private function bexecsendw($wsuser, $wspwd, $idlead, $idleaddst, $amount, $idcurrency)
	{
		$this->updateField($execsendw, "wsuser", "WSITALCAMBIO");
		$this->updateField($execsendw, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($execsendw, "idlead", $idlead);
		$this->updateField($execsendw, "idleaddst", $idleaddst);
		$this->updateField($execsendw, "amount", $amount);
		$this->updateField($execsendw, "idcurrency", $idcurrency);
		return $execsendw;
	} // bexecsendw

	function mexecsendw($idlead, $idleaddst, $amount, $idcurrency, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$execsendw =  $this->bexecsendw("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idleaddst, $amount, $idcurrency);
		$data["execsendw"] = $execsendw;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mexecsendw

	private function bexecsendtr($wsuser, $wspwd, $idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban)
	{
		$this->updateField($execsendtr, "wsuser", "WSITALCAMBIO");
		$this->updateField($execsendtr, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($execsendtr, "idlead", $idlead);
		$this->updateField($execsendtr, "idcountry", $idcountry);
		$this->updateField($execsendtr, "idcurrency", $idcurrency);
		$this->updateField($execsendtr, "amount", $amount);
		$this->updateField($execsendtr, "idclearencetype", $idclearencetype);
		$this->updateField($execsendtr, "acc", $acc);
		$this->updateField($execsendtr, "reference", $reference);
		$this->updateField($execsendtr, "bfirstname", $bfirstname);
		$this->updateField($execsendtr, "bmiddlename", $bmiddlename);
		$this->updateField($execsendtr, "blastname", $blastname);
		$this->updateField($execsendtr, "bsecondlastname", $bsecondlastname);
		$this->updateField($execsendtr, "bdocumentid", $bdocumentid);
		$this->updateField($execsendtr, "baddress", $baddress);
		$this->updateField($execsendtr, "bacc", $bacc);
		$this->updateField($execsendtr, "bbank", $bbank);
		$this->updateField($execsendtr, "bbankcountry", $bbankcountry);
		$this->updateField($execsendtr, "bbankcity", $bbankcity);
		$this->updateField($execsendtr, "bbankaddress", $bbankaddress);
		$this->updateField($execsendtr, "bbankabaswiftiban", $bbankabaswiftiban);
		$this->updateField($execsendtr, "ibacc", $ibacc);
		$this->updateField($execsendtr, "ibbank", $ibbank);
		$this->updateField($execsendtr, "ibbankcountry", $ibbankcountry);
		$this->updateField($execsendtr, "ibbankcity", $ibbankcity);
		$this->updateField($execsendtr, "ibbankaddress", $ibbankaddress);
		$this->updateField($execsendtr, "ibbankabaswiftiban", $ibbankabaswiftiban);
		return $execsendtr;
	} // bexecsendtr

	function mexecsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$execsendtr =  $this->bexecsendtr("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban);
		$data["execsendtr"] = $execsendtr;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mexecsendtr

	private function bgetcreditinstrumentl($wsuser, $wspwd)
	{
		$this->updateField($getcreditinstrumentl, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcreditinstrumentl, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcreditinstrumentl;
	} // bgetcreditinstrumentl

	function mgetcreditinstrumentl($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcreditinstrumentl = $this->bgetcreditinstrumentl("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcreditinstrumentl"] = $getcreditinstrumentl;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcreditinstrumentl

	private function bgetpartyexists($wsuser, $wspwd, $idlead, $documentid)
	{
		$this->updateField($getpartyexists, "wsuser", "WSITALCAMBIO");
		$this->updateField($getpartyexists, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		$this->updateField($getpartyexists, "idlead", $idlead);
		$this->updateField($getpartyexists, "documentid", $documentid);
		return $getpartyexists;
	} // bgetpartyexists

	function mgetpartyexists($idlead, $documentid, $url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getpartyexists = $this->bgetpartyexists("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919", $idlead, $documentid);
		$data["getpartyexists"] = $getpartyexists;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetpartyexists

	private function bgetcompliancedoctypel($wsuser, $wspwd)
	{
		$this->updateField($getcompliancedoctypel, "wsuser", "WSITALCAMBIO");
		$this->updateField($getcompliancedoctypel, "wspwd", "1cc61eb7ae2187eb91f97d1ae5300919");
		return $getcompliancedoctypel;
	} // bgetcompliancedoctypel

	function mgetcompliancedoctypel($url = "https://www.italcontroller.com/italsis/includes/rest/SERVER/XATOXI/services.php")
	{
		$this->init($url);
		$getcompliancedoctypel = $this->bgetcompliancedoctypel("WSITALCAMBIO", "1cc61eb7ae2187eb91f97d1ae5300919");
		$data["getcompliancedoctypel"] = $getcompliancedoctypel;
		$data_string = json_encode($data);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($this->client);
		$result = json_decode($response);
		return ($result);
	} // mgetcompliancedoctypel

} // class xclient
