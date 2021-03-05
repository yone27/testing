<?php
	chdir(dirname(__FILE__));
	include_once("xclient.php");
	chdir(dirname(__FILE__));
	
	$tc = new xclient();
	
	$res = $tc->mgetproviderl(49);

	var_dump($res);


?>