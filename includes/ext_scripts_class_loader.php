<?php
	//This file exists just to clear some space from all the /scripts files.
	session_start();
	
	define('INIT_SITE', TRUE); //Init config
	
	require('../configuration.php');
	require('../misc/connect.php');
	require('../misc/func_lib.php');
	require('../classes/account.php');
	require('../classes/website.php');
	require('../classes/character.php');
	require('../classes/server.php');
	
	connect::connectToDB();
?>