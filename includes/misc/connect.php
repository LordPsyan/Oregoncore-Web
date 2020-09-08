<?php

class connect {
	
	public static $connectedTo = NULL;

     public static function connectToDB() 
	 {
		 if(self::$connectedTo != 'global')
		 {
			 if (!mysql_connect($GLOBALS['connection']['host'],$GLOBALS['connection']['user'],$GLOBALS['connection']['password']))
				 buildError("<b>Database Connection error:</b> A connection could not be established. Error: ".mysql_error(),NULL);
			 self::$connectedTo = 'global';	 
		 }
	 }
	 
	public static function connectToRealmDB($realmid) 
	{ 
		self::selectDB('webdb');
		
			if($GLOBALS['realms'][$realmid]['mysql_host'] != $GLOBALS['connection']['host'] 
			|| $GLOBALS['realms'][$realmid]['mysql_user'] != $GLOBALS['connection']['user'] 
			|| $GLOBALS['realms'][$realmid]['mysql_pass'] != $GLOBALS['connection']['password'])
			{
				mysql_connect($GLOBALS['realms'][$realmid]['mysql_host'],
							  $GLOBALS['realms'][$realmid]['mysql_user'],
							  $GLOBALS['realms'][$realmid]['mysql_pass'])
							  or 
							  buildError("<b>Database Connection error:</b> A connection could not be established to Realm. Error: ".mysql_error(),NULL);
			}
			else
			{
				self::connectToDB();
			}
			mysql_select_db($GLOBALS['realms'][$realmid]['chardb'])or 
			buildError("<b>Database Selection error:</b> The realm database could not be selected. Error: ".mysql_error(),NULL);
			self::$connectedTo = 'chardb';

	}
	 
	 
	 public static function selectDB($db) 
	 {
		 self::connectToDB();
		 
		 switch($db) {
			default: 
				mysql_select_db($db);
			break;
			case('logondb'):
				mysql_select_db($GLOBALS['connection']['logondb']);
			break;
			case('webdb'):
				mysql_select_db($GLOBALS['connection']['webdb']);
			break;
			case('worlddb'):
				mysql_select_db($GLOBALS['connection']['worlddb']);
			break;
		 }
			 return TRUE;
	 }
	 
	  public static function checkRevision() 
	  {
		 connect::selectDB('webdb');
		 $getRevision = mysql_query("SELECT version FROM db_version LIMIT 1");
		 $row = mysql_fetch_assoc($getRevision);
		 
		 if ($GLOBALS['current_revision']!=$row['version']) 
		 {
			 buildError("<b>Wrong database version:</b> Mismatching database & core. Expected: ".$GLOBALS['current_revision'].", Installed: ".$row['version'],NULL);
			if ($GLOBALS['shutDownOnMismatch']==true) 
			{
				die("<b>Wrong database version:</b> Mismatching database & core. Expected: ".$GLOBALS['current_revision'].", Installed: ".$row['version']);
			}
		 } 
	 }
}

/*************************/
	/* Realms & service prices automatic settings
	/*************************/
	$realms = array();
	$service = array();
	
	$link = mysql_connect($GLOBALS['connection']['host'],$GLOBALS['connection']['user'],$GLOBALS['connection']['password']);
	mysql_select_db($connection['webdb']);
	
	//Realms
		$getRealms = mysql_query("SELECT * FROM realms ORDER BY id ASC");
		while($row = mysql_fetch_assoc($getRealms)) 
		{
				$realms[$row['id']]['id']=$row['id'];
				$realms[$row['id']]['name']=$row['name'];
				$realms[$row['id']]['chardb']=$row['char_db'];
				$realms[$row['id']]['description']=$row['description'];
				$realms[$row['id']]['port']=$row['port'];
				
				$realms[$row['id']]['rank_user']=$row['rank_user'];
				$realms[$row['id']]['rank_pass']=$row['rank_pass'];
				$realms[$row['id']]['ra_port']=$row['ra_port'];
				$realms[$row['id']]['soap_host']=$row['soap_port'];
				
				$realms[$row['id']]['host']=$row['host'];
				
				$realms[$row['id']]['sendType']=$row['sendType'];
				
				$realms[$row['id']]['mysql_host']=$row['mysql_host'];
				$realms[$row['id']]['mysql_user']=$row['mysql_user'];
				$realms[$row['id']]['mysql_pass']=$row['mysql_pass'];
			 }
        	     
			 //Service prices
		$getServices = mysql_query("SELECT enabled,price,currency,service FROM service_prices");
		while($row = mysql_fetch_assoc($getServices)) 
		{
			$service[$row['service']]['status']=$row['enabled'];
			$service[$row['service']]['price']=$row['price'];
			$service[$row['service']]['currency']=$row['currency'];
		}
		mysql_close($link);
		
		##Unset Magic Quotes
		if (get_magic_quotes_gpc()) {
			$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
			while (list($key, $val) = each($process)) {
				foreach ($val as $k => $v) {
					unset($process[$key][$k]);
					if (is_array($v)) {
						$process[$key][stripslashes($k)] = $v;
						$process[] = &$process[$key][stripslashes($k)];
					} else {
						$process[$key][stripslashes($k)] = stripslashes($v);
					}
				}
			}
			unset($process);
		}

?>