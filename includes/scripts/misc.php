<?php

require('../ext_scripts_class_loader.php');

if(isset($_POST['element']) &&$_POST['element'] =='vote') 
{
   echo 'Vote Points: '.account::loadVP($_POST['account']);
}
#################
elseif(isset($_POST['element']) && $_POST['element']=='donate') 
{
   echo $GLOBALS['donation']['coins_name'].': '.account::loadDP($_POST['account']);
}
#################
if(isset($_POST['action']) && $_POST['action']=='removeComment') 
{
   connect::selectDB('webdb');
   mysql_query("DELETE FROM news_comments WHERE id='".(int)$_POST['id']."'");
}
#################
if(isset($_POST['getTos'])) 
{
   include("../../documents/termsofservice.php");
   echo $tos_message;
}
#################
if(isset($_POST['getRefundPolicy'])) 
{
   include("../../documents/refundpolicy.php");
   echo $rp_message;
}
#################
if(isset($_POST['serverStatus'])) 
{
  
		 $num = 0;
		 foreach ($GLOBALS['realms'] as $k => $v) {
			 if ($num != 0) { }
			   server::serverStatus($k);
			   $num++;
		   }
		 
		unset($num);
?>

<?php   
}
#################
if(isset($_POST['convertDonationList']))
{
	for ($row = 0; $row < count($GLOBALS['donationList']); $row++)
		{
				$value = (int)$_POST['convertDonationList'];
				if($value == $GLOBALS['donationList'][$row][1])
				{
					echo $GLOBALS['donationList'][$row][2];
					exit();
				}
		}
}

?>