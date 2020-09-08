<?php
define('INIT_SITE', TRUE);
include('../../includes/misc/headers.php');
include('../../includes/configuration.php');
include('../functions.php');
$server = new server;
$account = new account;

$server->selectDB('webdb');

##############################
if($GLOBALS['core_expansion']==3)
	$guidString = 'playerGuid';
else
	$guidString = 'guid';	

if($GLOBALS['core_expansion']==3)
	$closedString = 'closed';
else
	$closedString = 'closedBy';
	
if($GLOBALS['core_expansion']==3)

	$ticketString = 'guid';
else
	$ticketString = 'ticketId';
############################			

if($_POST['action']=='edit') 
{
	$id = (int)$_POST['id'];
	$new_id = (int)$_POST['new_id'];
	$name = mysql_real_escape_string(trim($_POST['name']));
	$host = mysql_real_escape_string(trim($_POST['host']));
	$port = (int)$_POST['port'];
	$chardb = mysql_real_escape_string(trim($_POST['chardb']));
	
	if(empty($name) || empty($host) || empty($port) || empty($chardb))
		die("<span class='red_text'>Please enter all fields.</span><br/>");
	
	$server->logThis("Updated realm information for ".$name);
	
	mysql_query("UPDATE realms SET id='".$new_id."',name='".$name."',host='".$host."',port='".$port."',char_db='".$chardb."' WHERE id='".$id."'");
	return TRUE;
}
###############################
if($_POST['action']=='delete') 
{
	$id = (int)$_POST['id'];
	
	mysql_query("DELETE FROM realms WHERE id='".$id."'");
	
	$server->logThis("Deleted a realm");
}
###############################
if($_POST['action']=='edit_console') 
{
	$id = (int)$_POST['id'];
	$type = mysql_real_escape_string($_POST['type']);
	$user = mysql_real_escape_string(trim($_POST['user']));
	$pass = mysql_real_escape_string(trim($_POST['pass']));
	
	if(empty($id) || empty($type) || empty($user) || empty($pass))
		die();

	$server->logThis("Updated console information for realm with ID: ".$id);
	
	mysql_query("UPDATE realms SET sendType='".$type."',rank_user='".$user."',rank_pass='".$pass."' WHERE id='".$id."'");
	return TRUE;
}
###############################
if($_POST['action']=='loadTickets') 
{
	$offline = $_POST['offline'];
	$realm = mysql_real_escape_string($_POST['realm']);
	
	$_SESSION['lastTicketRealm']=$realm;
	$_SESSION['lastTicketRealmOffline']=$offline;
	
	if($realm == "NULL")
	   die("<pre>Please select a realm.</pre>");
	
	$server->selectDB($realm);
	
	$result = mysql_query("SELECT ".$ticketString.",name,message,createtime,".$guidString.",".$closedString." FROM gm_tickets ORDER BY ticketId DESC");
	if(mysql_num_rows($result)==0)
	   die("<pre>No tickets were found!</pre>");
	   
	echo '
	<table class="center">
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Message</th>
           <th>Created</th>
		   <th>Ticket Status</th>
           <th>Player Status</th>
           <th>Quick Tools</th>
       </tr>
	';
	
	while($row = mysql_fetch_assoc($result)) 
	{
		$get = mysql_query("SELECT COUNT(online) FROM characters WHERE guid='".$row[$guidString]."' AND online='1'");
		if(mysql_result($get,0)==0 && $offline == "on") {
		echo '<tr>';
			echo '<td><a href="?p=tools&s=tickets&guid='.$row[$ticketString].'&db='.$realm.'">'.$row[$ticketString].'</td>';
			echo '<td><a href="?p=tools&s=tickets&guid='.$row[$ticketString].'&db='.$realm.'">'.$row['name'].'</td>';
			echo '<td><a href="?p=tools&s=tickets&guid='.$row[$ticketString].'&db='.$realm.'">'.substr($row['message'],0,15).'...</td>';
			echo '<td><a href="?p=tools&s=tickets&guid='.$row[$ticketString].'&db='.$realm.'">'.date('Y-m-d H:i:s',$row['createtime']).'</a></td>';
			
			if($row[$closedString]==1) 
				echo '<td><font color="red">Closed</font></td>';
			else
				echo '<td><font color="green">Open</font></td>';		
			
			$get = mysql_query("SELECT COUNT(online) FROM characters WHERE guid='".$row[$guidString]."' AND online='1'");
			if(mysql_result($get,0)>0)
			   echo '<td><font color="green">Online</font></td>';
			else
			   echo '<td><font color="red">Offline</font></td>';
			   
			?> <td><a href="#" onclick="deleteTicket('<?php echo $row[$ticketString]; ?>','<?php echo $realm; ?>')">Delete</a>
             		&nbsp;
                    <?php if($row[$closedString]==1) 
					{ ?>
						<a href="#" onclick="openTicket('<?php echo $row[$ticketString]; ?>','<?php echo $realm; ?>')">Open</a>
					<?php }
					else 
					{
					?>
            	   <a href="#" onclick="closeTicket('<?php echo $row[$ticketString]; ?>','<?php echo $realm; ?>')">Close</a>
                   <?php
					}
					?>
            </td><?php
		echo '<tr>';
		}
	}
	echo '</table>';
	   
}
###############################
if($_POST['action']=='deleteTicket') 
{
	$id = (int)$_POST['id'];
	$db = mysql_real_escape_string($_POST['db']);
	mysql_select_db($db);
	
	mysql_query("DELETE FROM gm_tickets WHERE ".$ticketString."='".$id."'");
}
###############################
if($_POST['action']=='closeTicket') 
{
	$id = (int)$_POST['id'];
	$db = mysql_real_escape_string($_POST['db']);
	mysql_select_db($db);
	
	mysql_query("UPDATE gm_tickets SET ".$closedString."=1 WHERE ".$ticketString."='".$id."'");
}
###############################
if($_POST['action']=='openTicket')
{
	$id = (int)$_POST['id'];
	$db = mysql_real_escape_string($_POST['db']);
	mysql_select_db($db);
	
	mysql_query("UPDATE gm_tickets SET ".$closedString."=0 WHERE ".$ticketString."='".$id."'");
}
###############################
if($_POST['action']=='getPresetRealms')
{
	echo '<h3>Select a realm</h3><hr/>';
	$server->selectDB('webdb');
	
	$result = mysql_query('SELECT id,name,description FROM realms ORDER BY id ASC');
	while($row = mysql_fetch_assoc($result))
	{
		echo '<table width="100%">';
			echo '<tr>';
				echo '<td width="60%">';
					echo '<b>'.$row['name'].'</b>';
					echo '<br/>'.$row['description'];
				echo '</td>';
				
				echo '<td>';
					echo '<input type="submit" value="Select" onclick="savePresetRealm('.$row['id'].')">';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		echo '<hr/>';	
	}
	
}
###############################
if($_POST['action']=='savePresetRealm')
{
	$rid = (int)$_POST['rid'];
	
	if(isset($_COOKIE['presetRealmStatus']))
	{
		setcookie('presetRealmStatus',"",time()-3600*24*30*3,'/');
		setcookie('presetRealmStatus',$rid,time()+3600*24*30*3,'/');
	}
	else	
	{
		setcookie('presetRealmStatus',$rid,time()+3600*24*30*3,'/');
	}
}
###############################

?>