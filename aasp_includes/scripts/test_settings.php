<?php
define('INIT_SITE', TRUE);
include('../../includes/misc/headers.php');
include('../../includes/configuration.php');

###############################
if(isset($_POST['test'])) 
{
	$errors = array();
	
	/* Test Connection */
	if(!mysql_connect($GLOBALS['connection']['host'],$GLOBALS['connection']['user'],
	$GLOBALS['connection']['password'])) 
		$errors[] = "mySQL connection error. Please check your settings.";
	else 
	{
		if(!mysql_select_db($GLOBALS['connection']['webdb']))
			$errors[] = "Database error. Could not connect to the website database.";
		
		if(!mysql_select_db($GLOBALS['connection']['logondb']))
			$errors[] = "Database error. Could not connect to the logon database.";
		
		if(!mysql_select_db($GLOBALS['connection']['worlddb']))
			$errors[] = "Database error. Could not connect to the world database.";
	}
	
	if (!empty($errors)) 
	{
			foreach($errors as $error) 
			{
				echo  "<strong>*", $error ,"</strong><br/>";
			}
			
		} 
		else
			echo "No errors occured. Settings are correct.";
}
###############################
?>