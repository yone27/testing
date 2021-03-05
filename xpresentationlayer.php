<?php

session_start();

/*==========================================================================  
     Class: xpresentationLayer
     Description: MVC View. XATOXI Helper Methods
     Version: 1.0
     Remarks:
     ========================================================================*/

class xpresentationLayer
{

	/*=======================================================================
    Function: startHtml
    Description: HTML TAG START according to language "lang"
    Parameters: $lang <--
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
	static function startHtml($lang)
	{
		echo '<!DOCTYPE html>';
		echo '<HTML lang="' . $lang . '">';
	} // startHtml

	/*=======================================================================
    Function: endHtml
    Description: HTML TAG END and add the file .js
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
	static function endHtml()
	{
		echo '</HTML>';
		echo  ' <SCRIPT src="js/main.js" language="javascript" type="text/javascript"></SCRIPT>';
		echo  ' <SCRIPT src="js/main2.js" type="module"></SCRIPT>';
	} // endHtml

	/*=======================================================================
    Function: buildHead
    Description: HTML Head, rendering "title"
    Parameters: $title <-- name of App
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */

	static function buildHead($title)
	{
		echo  '<HEAD>';
		echo  ' <TITLE>' . $title . '</TITLE> ';
		echo  ' <META charset="UTF-8"> ';
		echo  ' <META name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> ';
		// echo  ' <LINK rel="stylesheet" type="text/css" href="css/normalize.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/style.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/animations.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/modal.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/loader.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/helpers.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/input.css"> ';
		echo  ' <LINK rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css"> ';
		echo  ' </HEAD> ';
	} //buildHead

	/*=======================================================================
    Function: buildHeaderXatoxi
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function buildHeaderXatoxi()
	{
		echo '<HEADER class="header">';
		echo '<DIV class="encabezado encabezado-home">';
		echo '    <A href="index.php" style="width: 25%;">';
		echo '    <IMG class="logo" src="img/home.png">';
		echo '    </A>';
		echo '    <IMG class="logo" src="img/logo.png">';
		echo '</DIV>';
		echo '</HEADER>';
	} // buildHeaderXatoxi

	/*=======================================================================
    Function: buildHeaderPrincipalXatoxi
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function buildHeaderPrincipalXatoxi()
	{
		echo '<HEADER class="header">';
		echo '  <DIV class="encabezado">';
		echo '  	<IMG class="logo" src="img/logo.png">';
		echo '  </DIV>';
		echo '</HEADER>';
	} // buildHeaderPrincipalXatoxi

	/*=======================================================================
    Function: startMain
    Description: Empieza tag MAIN 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function startMain()
	{
		echo '<MAIN class="wrapper">';
	} // startMain

	/*=======================================================================
    Function: endMain
    Description: Finaliza el tag MAIN
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function endMain()
	{
		echo '</MAIN>';
	} // endMain

	/*=======================================================================
    Function: startFirtsSection
    Description: Start tag SECTION (First Section)
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function startFirtsSection()
	{
		echo '<SECTION class="grid-3" id="wrapperButtons">';
	} //startFirtsSection

	/*=======================================================================
    Function: endSection
    Description: End tag SECTION 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function endSection()
	{
		echo ' </SECTION>';
	} //endSection

	/*=======================================================================
    Function: buildOptionGrid
    Description: Build options in the first section with a limit of 3 and set the $title name
    Parameters: $title <-- Name Option
                $data_id <-- Para relacionar con las opciones de buildOptionsPrincipal
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function buildOptionGrid($title, $data_id = "")
	{
		echo '    <ARTICLE class="grid-item grid-item-Opc-2" data-id="' . $data_id . '" >';
		echo '        <H3>' . $title . '</H3>';
		echo '    </ARTICLE>';
	} //buildOptionGrid

	/*=======================================================================
    Function: startSectionTwoColumns
    Description: Start Tag SECTION  (SecondSection) with 2 columns
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function startSectionTwoColumns()
	{
		echo '<SECTION class="marginSect grid-2" id="mainMenu">';
	} //startSectionTwoColumns

	/*=======================================================================
    Function: buildInputNumberGrid
    Description: Build Input number with decimals (2 Columns)
    Parameters: $titleLabel <-- Name label
                $idInput <-- Id Input
                $nameInput <-- Name Input
                $placeholder <-- Message Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function buildInputNumberGrid($titleLabel, $idInput, $nameInput, $placeholder = "", $onblur = "")
	{
		if ($onblur != "")
			$onblur = ' onBlur="' . $onblur . '" ';

		echo '<DIV class="grid-item-no-border">';
		echo '    <LABEL class="font-Bold">' . $titleLabel . '</LABEL>';
		echo '    <INPUT type="number" name="' . $nameInput . '" id="' . $idInput . '" pattern="[0-9]+([\.,][0-9]+)?" step=".01" placeholder="' . $placeholder . '" ' . $onblur . '>';
		echo '</DIV>';
	} //buildInputNumberGrid

	/*=======================================================================
    Function: buildInputTextGrid
    Description: Input text (2 columns)
    Parameters: $titleLabel <-- Label Name
                $idInput <-- Input Id
                $nameInput <-- Input Nme
                $placeholder <-- Name Show Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildInputTextGrid($titleLabel, $idInput, $nameInput, $placeholder = "", $maxLength = "", $customClass = "", $classLabel = "", $disabled = "", $classInput = "")
	{
		if ($disabled != "") {
			$disabled = 'disabled="' . $disabled . '"';
		}

		if ($classInput != "") {
			$classInput = 'class="' . $classInput . ' input-radius"';
		} else {
			$classInput = 'class="input-radius"';
		}

		echo '<DIV class="grid-item-no-border ' . $customClass . ' ">';
		echo '       <LABEL class="font-Bold ' . $classLabel . '">' . $titleLabel . '</LABEL>';
		echo '       <INPUT ' . $disabled . ' type="text" name="' . $nameInput . '" id="' . $idInput . '" placeholder="' . $placeholder . '" maxlength="' . $maxLength . '" ' . $classInput . '>';
		echo '</DIV>';
	} //buildInputTextGrid

	/*=======================================================================
    Function: buildSelectJson
    Description: Build Select with Jason 
    Parameters: $title <-- Contiene el titulo del objeto		
                $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $event <--
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
	static function buildSelectJson($title, $name, $id, $json, $showCol = "", $event = "", $classContainer = "", $classInput = "select-width")
	{
		$data = $json->list;
		if ($event != "") {
			$event = 'onchange="' . $event . '"';
		}

		echo '<DIV class="grid-item-no-border ' . $classContainer . '">';
		echo '    <LABEL class="font-Bold">' . $title . '</LABEL>';

		echo '<SELECT name="' . $name . '" id="' . $id . '" ' . $event . ' class="' . $classInput . '">';
		echo '<OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data as $value) {
			if ($id != "currencyCommend" && $id != "currencyTransfer" && $id != "currencyWallet") {
				echo '<OPTION value="' . $value->id . '">' . $value->name . ' </OPTION>';
			} else {
				echo '<OPTION value="' . $value->id . '">' . $value->iso . ' </OPTION>';
			}
		}
		echo '</SELECT>';
		echo '</DIV>';
	} //buildSelectJson

	/*=======================================================================
    Function: buildSectionPin
    Description: Construye la tercera seccion con el pin
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 10:12
    ===================================================================== */
	static function buildSectionPin($data = "")
	{
		if ($data != "")
			$data = ' data-targetping="' . $data . '" ';

		echo '<SECTION class="grid-section marginSect" >';
		echo '<FIGURE class="figure-img ping hidden" ' . $data . '><IMG src="img/LOCK.png" alt="boton ping" class="img-pin"></FIGURE>';
		echo '</SECTION>';
	} //buildSectionPin

	/*=======================================================================
    Function: buildFooterXatoxi
    Description: Construye el footer de la aplicacion Xatoxi
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 10:12
    ===================================================================== */
	static function buildFooterXatoxi()
	{
		echo '<FOOTER class="main-footer">';
		echo '    <DIV class="pie_pagina">';
		echo '        <H6>by XATOXI</H6>';
		echo '    </DIV>';
		echo '</FOOTER>';
	} //buildFooterXatoxi

	/*=======================================================================
    Function: buildTitleBar
    Description: Build a title bar
    Parameters: $tittle <-- Name Option
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildTitleBar($title)
	{
		echo '<DIV class="section-Titles">';
		echo '    <H2 class="titles">' . $title . '</H2>';
		echo '</DIV>';
	} //buildTitleBar

	/*=======================================================================
    Function: buildSearchUsersWallet
    Description: Build a contact list without option to register a new contact
    Parameters: $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $event <-- 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildSearchUsersWallet($name, $id, $json, $showCol = "", $event = "")
	{
		$data = $json->list;
		echo '<SECTION class="marginSect">';
		echo '    <ASIDE class="aside">';
		echo '       <SELECT name="' . $name . '" id="' . $id . '" ' . $event . ' class="select-width-user select-appearance-user">';
		echo '       <OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data as $value) {
			echo '<OPTION value="' . $value->id . '">' . $value->name . ' </OPTION>';
		}
		echo '        </SELECT>';
		echo '        <BUTTON class="btn-contacts btn"><figure><img src="img/address-book.png" alt=""></figure></BUTTON>';
		echo '        <BUTTON class="btn-search btn"><figure><img src="img/search.png" alt=""></figure></BUTTON>';
		echo '    </ASIDE>';
		echo '</SECTION>';
	} //buildSearchUsersWallet

	/*=======================================================================
    Function: buildSearchUsersCommend
    Description: Build a contact list with option to register a new contact
    Parameters: $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $placeholder <-- Define la mascara o titulo informativo del objeto cuando esta en blanco
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildSearchUsersCommend($name, $id, $idButtom, $json, $event = "", $eventAddContact = "")
	{
		if ($eventAddContact != "") {
			$eventAddContact = 'onclick="' . $eventAddContact . '"';
		}

		$data = $json->list;
		echo '<DIV class="aside">';
		echo '       <SELECT name="' . $name . '" id="' . $id . '" ' . $event . ' class="select-width-user select-appearance-user">';
		echo '       <OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data as $value) {
			echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
		}
		echo '        </SELECT>';
		echo '    <BUTTON class="btn-contacts btn" ' . $eventAddContact . ' id="' . $idButtom . '">';
		echo '        <FIGURE><IMG src="img/user-plus.png" alt=""></FIGURE>';
		echo '    </BUTTON>';
		// echo '    <BUTTON class="btn-search btn">';
		// echo '        <FIGURE><IMG src="img/search.png" alt=""></FIGURE>';
		// echo '    </BUTTON>';
		// echo '    <BUTTON class="btn-search btn">';
		// echo '        <FIGURE><IMG src="img/plus-square.png" alt=""></FIGURE>';
		// echo '    </BUTTON>';
		echo '</DIV>';
	} //buildSearchUsersCommend

	/*================== =====================================================
    Function: buildMenuOptionGrid
    Description: Build option with title and image dinamyc
    Parameters: $nameImg <-- Image name
                $titleOption <-- Option name    
                $modal <-- Show modal or no.               
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildMenuOptionGrid($nameImg, $titleOption, $modal, $url)
	{
		$opnModal = "";

		if ($modal == true) {
			$opnModal = "openModal";
		}

		echo '<ARTICLE class="grid-item ' . $opnModal . '" data-url="' . $url . '">';
		echo '    <FIGURE>';
		echo '        <IMG class="imgMenu" src="img/' . $nameImg . '">';
		echo '    </FIGURE>';
		echo '    <H1>' . $titleOption . '</H1>';
		echo '</ARTICLE>';
	} //buildMenuOptionGrid

	/*=======================================================================
    Function: buildMenuOptionComplete
    Description: Build option with title and image dinamyc
    Parameters: $nameImg <-- Image name
                $titleOption <-- Option name    
                $modal <-- Show modal or no.          
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildMenuOptionComplete($nameImg, $titleOption, $modal)
	{
		$opnModal = "";
		if ($modal == true) {
			$opnModal = "openModal";
		}
		echo '<ARTICLE class="grid-item grid-item-2 ' . $opnModal . '">';
		echo '    <FIGURE>';
		echo '        <IMG class="imgMenu" src="img/' . $nameImg . '">';
		echo '    </FIGURE>';
		echo '    <H1>' . $titleOption . '</H1>';
		echo '</ARTICLE>';
	} //buildMenuOptionComplete

	/*=======================================================================
    Function: buildInputMedium
    Description: Build input size medium
    Parameters: $titleLabel <-- Label Name
                $nameImg <-- Image name
                $titleOption <-- Option name   
                $placeholder <-- Name Show Field 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
	static function buildInputMedium($titleLabel, $idInput, $nameInput, $placeholder = "")
	{
		echo '<DIV class="grid-item-no-border grid-item-1">';
		echo '  <LABEL class="font-Bold margin-label">' . $titleLabel . '</LABEL>';
		echo '  <INPUT type="text" name="' . $nameInput . '" id="' . $idInput . '" placeholder="' . $placeholder . '" class="input-radius input-medium">';
		echo '</DIV>';
	} //buildInputMedium

	/*=======================================================================
    Function: startSectionTwoColumns
    Description: Start Tag ASIDE  (SecondSection) with 1 column
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 14:00
    ===================================================================== */
	static function startAsideOneColumn()
	{
		echo '<ASIDE class="grid-1">';
	} //startSectionTwoColumns

	/*=======================================================================
    Function: endAside
    Description: end Tag ASIDE 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 14:00
    ===================================================================== */
	static function endAside()
	{
		echo '</ASIDE>';
	} //endAside

	/*=======================================================================
    Function: buildPhoneComplete
    Description: Build section phones witch country phone, area cod and number (Fields Centers)
    Parameters: $titleLabel <- label title
                $nameCountry <- name select country
                $nameArea  <- name select country
                $namePhone <- name phone
                $idCountry <- id select country
                $idArea <- id select country
                $idPhone <- id phone
                $jsonCode <- json for select code country
                $jsonArea <- json for select code area for country
                $event  <- to call a event in the select   
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 12:00
    ===================================================================== */
	static function buildPhoneComplete($titleLabel, $nameCountry, $nameArea, $namePhone, $idCountry, $idArea, $idPhone, $jsonCode, $jsonArea, $event = "")
	{

		$data = $jsonCode->list;
		$data2 = $jsonArea->list;

		if ($event != "") {
			$event = 'onchange="' . $event . '"';
		}

		echo '<DIV class="grid-item-no-border grid-item-1">';
		echo '  <LABEL class="font-Bold margin-label">' . $titleLabel . '</LABEL>';
		echo '  <DIV class="flex-content">';
		echo '<SELECT name="' . $nameCountry . '" id="' . $idCountry . '" ' . $event . ' class="select-width">';
		echo '<OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data as $value) {
			if ($value->internationalphonecode != "58") {
				echo '<OPTION value="' . $value->id . '" >' . $value->internationalphonecode . ' </OPTION>';
			} else {
				echo '<OPTION value="' . $value->id . '" selected>' . $value->internationalphonecode . ' </OPTION>';
			}
		}
		echo '</SELECT>';
		echo '<SELECT name="' . $nameArea . '" id="' . $idArea . '" class="select-width">';
		echo '<OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data2 as $value) {
			echo '<OPTION value="' . $value->id . '" >' . $value->code . ' </OPTION>';
		}
		echo '</SELECT>';

		echo '    <INPUT type="text" name="' . $namePhone . '" id="' . $idPhone . '" class="input-radius"  pattern="[0-9]+([\.,][0-9]+)?">';
		echo '  </DIV>';
		echo '</DIV>';
	} //buildPhoneComplete


	/*=======================================================================
    Function: buildpinTemporal
    Description: Bild information of pin temporal, without forgot password and register
    Parameters:            
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 12:00
    ===================================================================== */
	static function buildpinTemporal()
	{
		echo '<P class="resOp"> Usuario creado satisfactoriamente, su PIN de entrada es:</P>';
		echo '<DIV class="centrarObjets">';
		echo '    <P class="font-subtitle">7213</P>';
		echo '    <A href="#close" class="button"> Continuar </A>';
		echo '</DIV>';
	} //buildpinTemporal

	/*=======================================================================
    Function: startSectionOpt
    Description: Start section for options 
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
	static function startSectionOpt()
	{
		echo '<SECTION class="grid-2" id="item-container">';
	} //startSectionOpt

	/*=======================================================================
    Function: startNav
    Description: Start nav
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
	static function startNav($class = "", $id = "")
	{
		if ($class != "") {
			$class = 'class="' . $class . '"';
		}
		if ($id != "") {
			$id = 'id="' . $id . '"';
		}

		echo '<nav ' . $class . ' ' . $id . '>';
	} //startSectionOpt

	/*=======================================================================
    Function: endNav
    Description: End nav
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
	static function endNav()
	{
		echo '</nav>';
	} //startSectionOpt

	/*=======================================================================
    Function: buildOptionsPrincipal
    Description: Build principal options of the services
    Parameters: $titleOption <-- Option name  
                $data_id <-- Para relacionar con las opciones de buildOptionGrid    
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 10:00
    ===================================================================== */
	static function buildOptionsPrincipal($titleLabel, $data_id = "")
	{
		echo '	<ARTICLE class="grid-item-Opc grid-item-2" data-id="' . $data_id . '">';
		echo '		<H1>' . $titleLabel . '</H1>';
		echo '	</ARTICLE>';
	} //buildOptionsPrincipal
	
	/*=======================================================================
    Function: buildNavBtn
    Description:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 10:00
    ===================================================================== */
	static function buildNavBtn($title, $data_id = "")
	{
		if ($data_id != "") {
			$data_id = 'data-id="' . $data_id . '"';
		}

		echo '	<BUTTON class="grid-item-Opc grid-item-2" "' . $data_id . '">';
		echo $title;
		echo '	</BUTTON>';
	} //buildNavBtn

	/*=======================================================================
    Function: buildPinPrincipalModal 
    Description: Build Principal Pin Modal, with forgot password and Register options
                  the class "close"   close the modal 
    Parameters: $title <-- Image name
                $limitPass <-- Length limit   
                $minLength <-- Min character (the field turn red if the length is <)
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
	static function buildPinPrincipalModal($title, $limitPass, $minLength, $eventButton = "", $btnId = "")
	{
		if ($btnId != "") {
			$btnId = 'id="' . $btnId . '"';
		}
		if ($eventButton != "") {
			$eventButton = 'onclick="' . $eventButton . '"';
		}

		echo '<DIV class="divpin">';
		echo '<H1>' . $title . '</H1>';
		echo '</DIV>';
		echo '<DIV class="centrarObjets"><INPUT type="password" name="pin" id="pin" pattern=".{' . $minLength . ',}" maxlength="' . $limitPass . '" class ="passInput" value""></DIV><BR>';
		echo '<DIV class="centrarObjets"><LABEL class="label-pin" >TAG</LABEL> <BR><INPUT type="password" name="tag" id="tag"  pattern=".{24,}" maxlength="24" class="passInput" value="123456789012345768901213"></DIV>';
		echo '<DIV>';
		echo '<TABLE class="centrarObjets">';
		echo '    <TBODY>';
		echo '        <TR></TR>';
		echo '        <TR></TR>';
		echo '        <TR></TR>';
		echo '        <TR>';
		echo '            <TD> <input value=" 1 " onclick="numero(\'1\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 2 " onclick="numero(\'2\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 3 " onclick="numero(\'3\')" type="button" class="botones"></TD>';
		echo '        </TR>';
		echo '        <TR>';
		echo '            <TD> <input value=" 4 " onclick="numero(\'4\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 5 " onclick="numero(\'5\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 6 " onclick="numero(\'6\')" type="button" class="botones"></TD>';
		echo '        </TR>';
		echo '        <TR>';
		echo '            <TD> <input value=" 7 " onclick="numero(\'7\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 8 " onclick="numero(\'8\')" type="button" class="botones"></TD>';
		echo '            <TD> <input value=" 9 " onclick="numero(\'9\')" type="button" class="botones"></TD>';
		echo '        </TR>';
		echo '        <TD></TD>';
		echo '        <TD><input value=" 0 " onclick="numero(\'0\')" type="button" class="botones"></TD>';
		echo '        <TD> <input type="image" name="botondeenvio" src="img/iconoborrar.png" class="imgErase" onclick="borradoUltimaCifra()"></TD>';
		echo '        <TD></TD>';
		echo '        </TR>';
		echo '    </TBODY>';
		echo '</TABLE>';
		echo '<A class="wordsFM" href="">Cambio de PIN</A>';
		echo '<DIV class="centrarObjets">';
		echo '    <SPAN class="button" ' . $btnId . ' ' . $eventButton . '> Aceptar </SPAN>';
		echo '</DIV>';
		echo '<A class="wordsFM " href="Register.php">Registro</A>';
		echo '</DIV>';
	} //buildPinPrincipalModal

	/*=======================================================================
    Function: startInputModal
    Description: build header  modal
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
	static function startInputModal($customClass = "modalContainer")
	{
		echo '<DIV id="tvesModal" class="' . $customClass . '">';
		echo '   <DIV class="modal-content">';
		echo '      <SPAN class="close">×</SPAN>';
	} //startInputModal

	/*=======================================================================
    Function: endInputModal
    Description: end header modal
    Parameters:        
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
	static function endInputModal()
	{
		echo '    </DIV>';
		echo '</DIV>';
	} //endInputModal

	/*=======================================================================
    Function: buildHeaderText
    Description: build header with title without logos
    Parameters:      Transacción Satisfactoria
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
	static function buildHeaderText($title)
	{
		echo '<HEADER class="header header-text">';
		echo '  <H1 class="titles">' . $title . '</H1>';
		echo '</HEADER>';
	} //buildHeaderText

	/*=======================================================================
    Function: buildSuccessful
    Description: build section message successful
    Parameters: $title <-- 
                $buttonTitle <-- Button Title
    Algorithm:
    Remarks:
    Standarized: 2021/01/26 10:00
    ===================================================================== */
	static function buildSuccessful($title, $buttonTitle)
	{
		echo '<DIV class="centrarObjets">';
		echo '    <FIGURE><IMG src="img/success.png" alt="" class="logo"></FIGURE>';
		echo '    <H1>' . $title . '</H1>';
		echo '    <BUTTON class="button"> ' . $buttonTitle . '</BUTTON>';
		echo '</DIV>';
	} //buildSuccessful

	/*=======================================================================
    Function: startAnimationMenu
    Description: start the section to animation menu
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function startAnimationMenu()
	{
		echo '<DIV id="wrapper" class="animate animate__fadeOut hidden">';
	} //startAnimationMenu

	/*=======================================================================
    Function: endDiv
    Description: End tag DIV
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function endDiv()
	{
		echo '</DIV>';
	} //endDiv

	/*=======================================================================
    Function: startSectionButtos
    Description: start the section of buttos in X
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function startSectionButtos()
	{
		echo '<SECTION class="grid-3" id="wrapperButtons">';
	} //startSectionButtos

	/*=======================================================================
    Function: startSectionButtos
    Description: start the section of buttos in X
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function startContentSection()
	{
		echo '<DIV id="wrapperSections">';
	}

	/*=======================================================================
    Function: buildButtonCenter
    Description: start the section of buttos in X
    Parameters: $title <-- Title of button
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function buildButtonCenter($title, $event = "", $id = "")
	{
		if ($event != "") {
			$event = 'onclick="' . $event . '"';
		}

		if ($id != "") {
			$id = 'id="' . $id . '"';
		}

		echo '<DIV class="centrarObjets">';
		echo '    <BUTTON type="submit" class="button"  ' . $event . ' ' . $id . '>' . $title . '</BUTTON>';
		echo '</DIV>';
	} //buildButtonCenter

	static function startForm($id = "", $event = "")
	{
		if ($event != "") {
			$event = 'onsubmit="' . $event . '"';
		}

		echo '<FORM id="' . $id . '" ' . $event . '>';
	}

	/*=======================================================================
    Function: endForm
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function endForm()
	{
		echo '</FORM>';
	} //endForm

	/*=======================================================================
    Function: startContentofOption
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function startContentofOption($data_id = "")
	{
		echo '<DIV data-id="' . $data_id . '" class="hidden">';
	} //startContentofOption


	/*=======================================================================
    Function: buildSectionDocument
    Description: build a section with a small select, input text medium and input type date 
    Parameters:     $labelSelect <- label title of select
                    $labelInputText <- label title of intpu text
                    $labelInputDate <- label title of input date
                    $nameSelect <- name of select
                    $nameInputText <- name of intpu text
                    $nameInputDate <- name of intpu text
                    $idSelect <- id of select
                    $idInputText <- id of intpu text
                    $idInputDate <- id of intpu date
                    $jsonSelect <- json for select
    Algorithm:
    Remarks:
    Standarized: 2021/02/2 10:50
    ===================================================================== */
	static function buildSectionDocument($labelSelect, $labelInputText, $labelInputDate, $nameSelect, $nameInputText, $nameInputDate, $idSelect, $idInputText, $idInputDate, $jsonSelect)
	{
		$data = $jsonSelect->list;

		echo '<DIV class="doc-Perfil">';
		echo '    <DIV class="grid-item-no-border grid-item-1 marginSect">';
		echo '        <LABEL  class="font-Bold margin-label">' . $labelSelect . '</LABEL>';
		echo '<SELECT name="' . $nameSelect . '" id="' . $idSelect . '" class="select-small">';
		echo '<OPTION disabled selected>Seleccione</OPTION>';
		foreach ($data as $value) {
			echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
		}
		echo '</SELECT>';
		echo '    </DIV>';
		echo '    <DIV class="grid-item-no-border grid-item-1 marginSect">';
		echo '        <LABEL class="font-Bold margin-label">' . $labelInputText . '</LABEL>';
		echo '        <INPUT type="text" name="' . $nameInputText . '" id="' . $idInputText . '" class="input-radius ">';
		echo '    </DIV>';
		echo '    <DIV class="grid-item-no-border grid-item-1 marginSect">';
		echo '        <LABEL class="font-Bold margin-label">' . $labelInputDate . '</LABEL>';
		echo '        <INPUT type="date" name="' . $nameInputDate . '" id="' . $idInputDate . '" class="input-radius ">';
		echo '    </DIV>';
		echo '</DIV>';
	} //buildSectionDocument

	/*=======================================================================
    Function: buildTextArea
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function buildTextArea($titleLabel, $nameInput, $idInput, $placeholder = "", $minLength = "0")
	{
		echo '<DIV class="grid-item-no-border grid-item-1 grid-item-2 marginSect">';
		echo '    <LABEL class="font-Bold">' . $titleLabel . '</LABEL>';
		echo '    <TEXTAREA type="text" name="' . $nameInput . '" id="' . $idInput . '" placeholder="' . $placeholder . '" minlength="' . $minLength . '" class="input-text-large input-radius" cols="40" rows="3"  style="resize: none;"></TEXTAREA>';
		echo '</DIV>';
	} //buildTextArea

	/*=======================================================================
    Function: startContentofOption
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
	static function buildOtpContent()
	{
		echo '<SECTION class="text-center full-heigh center-height">';
		echo '<HEADER class="mb-20">';
		echo '	<H1 class="font-lg">OTP Verificación</H1>';
		echo '	<P>Presione aceptar, este código expirará en: <SPAN id="contador" class="font-green">00:114</SPAN></P>';
		echo '</HEADER>';
		echo '<ASIDE class="mb-20">';
		echo '	<INPUT type="text" disabled name="otpCode" id="otpCode" class="otpVeri">';
		echo '</ASIDE>';
		echo '<FOOTER>';
		echo '	<BUTTON class="button btn-semi-rounded" data-id="testing">Aceptar</BUTTON>';
		echo '	<BUTTON class="modal__button button button-danger btn-semi-rounded" type="button" aria-label="close modal" data-close>Cancelar</BUTTON>';
		echo '</FOOTER>';
		echo '</SECTION>';
	} //buildTextArea

	/*=======================================================================
    Function: startDivHidden 
    Description: start tag DIV with class hidden
    Parameters:  $id 
    Algorithm:
    Remarks:
    Standarized: 2021/02/20 12:00
    ===================================================================== */
	static function startDivHidden($id)
	{
		echo '<DIV id =' . $id . ' class="hidden">';
	} //startDivHidden
	/*=======================================================================
	Function: buildInputFileDoc
	Description: Build Input number with decimals (2 Columns)
	Parameters: $titleLabel <-- Name label
				$idInput <-- Id Input
				$nameInput <-- Name Input
				$placeholder <-- Message Field
	Algorithm:
	Remarks:
	Standarized: 2021/01/18 14:00
	===================================================================== */
	static function buildInputFileDoc($label, $id, $name)
	{
		echo '<DIV class="grid-item-no-border grid-item-1">';
		echo '<select name="selectDoc" id="selectDoc" class="select-width">';
		echo '<option disabled="" selected="">Seleccionar documento adjuntar</option>';
		echo '<option value="1">DOCUMENTO IDENTIDAD</option>';
		echo '</select>';
		echo '<DIV class="fileInput__container">';
		echo '      <LABEL class="font-Bold" for="' . $id . '"><I class="fas fa-upload fa-2x fileInput__icon"></I></LABEL>';
		echo '		';
		echo '      <INPUT class="fileInput" type="file" name="' . $name . '" id="' . $id . '">';
		echo '</DIV>';
		echo '</DIV>';
	} //buildInputFileGird

} // xpresentationLayer
