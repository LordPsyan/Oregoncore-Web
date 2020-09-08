<?php
function exit_page() 
{
	die("<h1>Server offline</h1>
		Currently the server is under maintenance please wait.
		<br/>
		<br/>
		<br/>
		<br/>
		<i>Power by Nefelin-WoW Project</i>");
}

function RandomString() 
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    
    for ($p = 0; $p < $length; $p++) 
	{
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}

function convTime($time)
{
	if($time<60) 
			$string = 'Seconds';
		elseif ($time > 60) 
		{
		    $time = $time / 60;
			$string = 'Minutes'; 
		if ($time > 60) 
		{									 
			$string = 'Hours';
			$time = $time / 60;
	    if ($time > 24) 
		{
			$string = 'Days';
			$time = $time / 24;
		}
		}
			$time = ceil($time);
		}
		return $time." ".$string;
}
?>