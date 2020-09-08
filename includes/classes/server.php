<?php
class server {
	
	public function getRealmId($char_db)
	{
		connect::selectDB('webdb');
		$get = mysql_query("SELECT id FROM realms WHERE char_db='".mysql_real_escape_string($char_db)."'");
		$row = mysql_fetch_assoc($get);
		return $row['id'];
	}
	
	public function getRealmName($char_db)
	{
		connect::selectDB('webdb');
		$get = mysql_query("SELECT name FROM realms WHERE char_db='".mysql_real_escape_string($char_db)."'");
		$row = mysql_fetch_assoc($get);
		return $row['name'];
	}
	
	public static function serverStatus($realm_id) 
	{
		//Get status
	    $fp = fsockopen($GLOBALS['realms'][$realm_id]['host'], $GLOBALS['realms'][$realm_id]['port'], $errno, $errstr, 1);
		if (!$fp) 
		   echo $status = '';
		else 
		{
		 echo $status = '';
			 
       echo '';
	   /* Players online bar */
	   if($GLOBALS['serverStatus']['factionBar']==TRUE) 
	   {   
		   connect::connectToRealmDB($realm_id);
		   $getChars = mysql_query("SELECT COUNT(online) FROM characters WHERE online=1");
		   $total_online = mysql_result($getChars,0);
	   
		   $getAlliance = mysql_query("SELECT COUNT(online) FROM characters WHERE online=1 AND race IN('3','4','7','11','1','22')");
		   $alliance = mysql_result($getAlliance,0);
		   
		   $getHorde = mysql_query("SELECT COUNT(online) FROM characters WHERE online=1 AND race IN('2','5','6','8','10','9')");
		   $horde = mysql_result($getHorde,0);
	   
		   if($total_online == 0) 
		   {
			  $per_alliance = 50; 
			  $per_horde = 50;
		   }
		   else
		   {
			   if($alliance == 0)
				   $per_alliance = 0;
			   else
				   $per_alliance = round(($alliance / $total_online) * 100);
			   
			   if($horde == 0)
				   $per_horde = 0;  
			   else
				   $per_horde = round(($horde / $total_online) * 100);
		   }
	   
	   if($per_alliance + $per_horde > 100) 
		   $per_horde = $per_horde - 1 ;
	   
	   ?>

    
        
	   <?php
	    }
	   
		//Get players online
		if ($GLOBALS['serverStatus']['playersOnline']==TRUE) 
		{
			connect::connectToRealmDB($realm_id);
			$getChars = mysql_query("SELECT COUNT(online) FROM characters WHERE online=1");
			$pOnline = mysql_result($getChars,0);
			echo '',$pOnline,'';
		}
		
	
		
	}
	
  }
}
?>