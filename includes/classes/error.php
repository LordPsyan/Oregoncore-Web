<?php
function buildError($error,$num) 
{
	if ($GLOBALS['useDebug']==false) 
		log_error($error,$num);
	else 
		errors($error,$num);
}

function errors($error,$num) 
{
	log_error(strip_tags($error),$num);
	die("<center><b>Website error</b>  <br/>
		The website script encountered an error and died. <br/><br/>
		<b>Error message: </b>".$error."  <br/>
		<b>Error number: </b>".$num."
		<br/><br/><br/><i>Powered by CraftedWeb
		<br/><font size='-2'>Professionally developed with love.</font></i></center>
		");
}

function log_error($error,$num) 
{
 error_log("*[".date("d M Y H:i")."] ".$error, 3, "error.log");
}

function loadCustomErrors() 
{
  set_error_handler("customError");   
}

function customError($errno, $errstr)
{
    if ($errno!=8 && $errno!=2048 && $GLOBALS['useDebug']==TRUE) 
          error_log("*[".date("d M Y H:i")."]<i>".$errstr."</i>", 3, "error.log");
}
?>