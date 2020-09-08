<?php

include('documents/alert.php');

if($alert_enabled == true)
{
	echo '<div id="alert"><b>Notice:</b> ';
	echo $alert_message; 
	echo '</div>';
}

?>