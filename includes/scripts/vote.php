<?php

require('../ext_scripts_class_loader.php');

if (isset($_POST['siteid'])) 
{
	$siteid = (int)$_POST['siteid'];

	connect::selectDB('webdb');
	
	if(website::checkIfVoted($siteid,$GLOBALS['connection']['webdb'])==TRUE)
		die("?p=vote");
	
	connect::selectDB('webdb');
	$check = mysql_query("SELECT COUNT(*) FROM votingsites WHERE id='".$siteid."'");
	if(mysql_result($check,0)==0)
	   die("?p=vote");
	
	if($GLOBALS['vote']['type']=='instant')
	{
		$acct_id = account::getAccountID($_SESSION['cw_user']);
		
		$next_vote = time() + $GLOBALS['vote']['timer'];
		
		connect::selectDB('webdb');
		
		mysql_query("INSERT INTO votelog VALUES('','".$siteid."',
		'".$acct_id."','".time()."','".$next_vote."','".$_SERVER['REMOTE_ADDR']."')");
		 
		$getSiteData = mysql_query("SELECT points,url FROM votingsites WHERE id='".$siteid."'");
		$row = mysql_fetch_assoc($getSiteData);
		
		//Update the points table.
		$add = $row['points'] * $GLOBALS['vote']['multiplier'];
		mysql_query("UPDATE account_data SET vp=vp + ".$add." WHERE id=".$acct_id);
		
		echo $row['url'];
	}
	elseif($GLOBALS['vote']['type']=='confirm')
	{
		connect::selectDB('webdb');
		$getSiteData = mysql_query("SELECT points,url FROM votingsites WHERE id='".(int)$_POST['siteid']."'");
		$row = mysql_fetch_assoc($getSiteData);
		
		
		$_SESSION['votingUrlID']=(int)$_POST['siteid'];
		
		echo $row['url'];
	}
	else
		die("Error!");
}

?>