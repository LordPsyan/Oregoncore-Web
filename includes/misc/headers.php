<?php
##############
# Start session
############## 
if(!isset($_SESSION)) 
      session_start();

############
# Start ob
############
ob_start();


############
# Enable all errors. None will be shown due to our custom errors.
############
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start microtime.
$start = microtime(true);
?>