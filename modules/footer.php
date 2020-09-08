<?php
if($GLOBALS['showLoadTime']==TRUE) 
{
	$end = number_format((microtime(true) - $GLOBALS['start']),2);
	echo "Page loaded in ", $end, " seconds. <br/>";
}
echo $GLOBALS['footer_text'];
?>