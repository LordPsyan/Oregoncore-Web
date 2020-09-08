<?php
#############################
## STAFF PANEL LOADER FILE ##
## ------------------------##
#############################

require('../includes/misc/headers.php'); //Load headers

define('INIT_SITE', TRUE);
include('../includes/configuration.php');

if($GLOBALS['adminPanel_enable']==FALSE)
	exit();

require('../includes/misc/compress.php'); //Load compression file
include('../aasp_includes/functions.php');

$server = new server;
$account = new account;
$page = new page;

$server->connect();

if(isset($_SESSION['cw_staff']) && !isset($_SESSION['cw_staff_id']) && $_GET['p']!='notice') 
  header("Location: ?p=notice&e=It seems like a session was not created! You were logged out to prevent any threat against the site.");
?>