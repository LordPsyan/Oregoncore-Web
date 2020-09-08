<?php
function sendRA($command,$ra_user,$ra_pass,$server,$realm_port) 
{
	$telnet = @fsockopen($server, $realm_port, $error, $error_str, 3);
	if($telnet)
	{
		fgets($telnet,1024);
		fputs($telnet, $ra_user."\n");
		sleep(3);

	    fputs($telnet, $ra_pass."\n");
		sleep(3);
	
		fputs($telnet, $command."\n");
		sleep(3);
		fclose($telnet);
	}
	else
		die('Connection problems...Aborting');
}
?>