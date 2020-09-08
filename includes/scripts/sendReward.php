<?php

require('../ext_scripts_class_loader.php');

if (isset($_POST['item_entry'])) 
{
	$entry = mysql_real_escape_string($_POST['item_entry']);
	$character_realm = mysql_real_escape_string($_POST['character_realm']);
	$type = mysql_real_escape_string($_POST['send_mode']);
	
	if (empty($entry) || empty($character_realm) || empty($type))
		echo '<b class="red_text">Please specify a character.</b>';
	else 
	{
		connect::selectDB('webdb');
		
		$realm = explode("*", $character_realm);
		
		$result = mysql_query("SELECT price FROM shopitems WHERE entry='".$entry."'");
		$row = mysql_fetch_assoc($result);
		$account_id = account::getAccountIDFromCharId($realm[0],$realm[1]);
		$account_name = account::getAccountName($account_id);
		
		if ($type=='vote') 
		{
        	if (account::hasVP($account_name,$row['price'])==FALSE)
				die('<b class="red_text">You do not have enough Vote Points</b>');
				
	    account::deductVP($account_id,$row['price']);
		
		} 
		elseif ($type=='donate') 
		{
			if (account::hasDP($account_name,$row['price'])==FALSE)
			   die('<b class="red_text">You do not have enough '.$GLOBALS['donation']['coins_name'].'</b>');

	        account::deductDP($account_id,$row['price']);
		}
		
	   shop::logItem($type,$entry,$realm[0],$account_id,$realm[1],1);
       $result = mysql_query("SELECT * FROM realms WHERE id='".$realm[1]."'");
	   $row = mysql_fetch_assoc($result);
	   
	  if($row['sendType']=='ra') 
	  {
		 require('../misc/ra.php');
		 require('../classes/character.php');
		  
		 sendRa("send items ".character::getCharname($realm[0])." \"Your requested item\" \"Thanks for supporting us!\" ".$entry." ",
		 $row['rank_user'],$row['rank_pass'],$row['host'],$row['ra_port']); 
	  } 
	  elseif($row['sendType']=='soap') 
	  {
		 require('../misc/soap.php');
		 require('../classes/character.php'); 
		 
		 sendSoap("send items ".character::getCharname($realm[0])." \"Your requested item\" \"Thanks for supporting us!\" ".$entry." ",
		 $row['rank_user'],$row['rank_pass'],$row['host'],$row['soap_port']);
	  }
	}
}

?>