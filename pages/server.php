<?php
class server {
	
public static function serverStatus($realm_id) 
	{
 ?>

        
        
	   <?php
	
	   
		//Get players online
		if ($GLOBALS['serverStatus']['playersOnline']==TRUE) 
		{
			connect::connectToRealmDB($realm_id);
			$getChars = mysql_query("SELECT COUNT(online) FROM characters WHERE online=1");
			$pOnline = mysql_result($getChars,0);
			echo '
					',$pOnline,'
				  ';
		}
		
		
		
	
	
  }
}
?>