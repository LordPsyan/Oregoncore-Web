<?php
define('INIT_SITE', TRUE);
include('../../includes/misc/headers.php');
include('../../includes/configuration.php');
include('../functions.php');
$server = new server;
$account = new account;

$server->selectDB('webdb');

###############################
if($_POST['action']=="payments") 
{
		$result = mysql_query("SELECT paymentstatus,mc_gross,datecreation FROM payments_log WHERE userid='".(int)$_POST['id']."'");
		if(mysql_num_rows($result)==0)
			echo "<b color='red'>No payments was found for this account.</b>";
		else 
		{
		?> <table width="100%">
               <tr>
                   <th>Amount</th>
                   <th>Payment Status</th>
                   <th>Date</th>
               </tr>
           <?php
		while($row = mysql_fetch_assoc($result)) 
		{ ?>
			<tr>
                 <td><?php echo $row['mc_gross'];?>$</td>
                 <td><?php echo $row['paymentstatus']; ?></td>
                 <td><?php echo $row['datecreation']; ?></td>   
            </tr>
		<?php }
		echo '</table>';
		}
	}
###############################	
elseif($_POST['action']=='dshop') 
{
		$result = mysql_query("SELECT entry,char_id,date,amount,realm_id FROM shoplog WHERE account='".(int)$_POST['id']."' AND shop='donate'");
		if(mysql_num_rows($result)==0)
			echo "<b color='red'>No logs was found for this account.</b>";
		else 
		{
		?> <table width="100%">
               <tr>
                   <th>Item</th>
                   <th>Character</th>
                   <th>Date</th>
                   <th>Amount</th>
               </tr>
           <?php
		while($row = mysql_fetch_assoc($result)) { ?>
			<tr>
                 <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
				 	 <?php echo $server->getItemName($row['entry']);?></a></td>
                 <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
                 <td><?php echo $row['date']; ?></td>   
                 <td>x<?php echo $row['amount']; ?></td>
            </tr>
		<?php }
		echo '</table>';
		}
	}
###############################	
elseif($_POST['action']=='vshop') 
{
		$result = mysql_query("SELECT entry,char_id,realm_id,date,amount FROM shoplog WHERE account='".(int)$_POST['id']."' AND shop='vote'");
		if(mysql_num_rows($result)==0)
			echo "<b color='red'>No logs was found for this account.</b>";
		else 
		{
		?> <table width="100%">
               <tr>
              	 <th>Item</th>
                 <th>Character</th>
                 <th>Date</th>
                 <th>Amount</th>
               </tr>
           <?php
		while($row = mysql_fetch_assoc($result)) { ?>
			<tr>
                 <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
				 	 <?php echo $server->getItemName($row['entry']);?></a></td>
                 <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
                 <td><?php echo $row['date']; ?></td>
                 <td>x<?php echo $row['amount']; ?></td>   
            </tr>
		<?php }
		echo '</table>';
		}
	}	
###############################	
elseif($_POST['action']=="search") 
{
	$input = mysql_real_escape_string($_POST['input']);
	$shop = mysql_real_escape_string($_POST['shop']);
	?>
    <table width="100%">
    <tr>
        <th>User</th>
        <th>Character</th>
        <th>Realm</th>
        <th>Item</th>
        <th>Date</th>
        <th>Amount</th>
    </tr>
	
	<?php 
	//Search via character name...
	$loopRealms = mysql_query("SELECT id FROM realms");
	while($row = mysql_fetch_assoc($loopRealms)) 
	{
		   $server->connectToRealmDB($row['id']);
		   $result = mysql_query("SELECT guid FROM characters WHERE name LIKE '%".$input."%'");
		   if(mysql_num_rows($result)>0) {
		   $row = mysql_fetch_assoc($result);
		   $server->selectDB('webdb');
		   $result = mysql_query("SELECT * FROM shoplog WHERE shop='".$shop."' AND char_id='".$row['guid']."'"); 
           
            while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
            <td>x<?php echo $row['amount']; ?></td>   
        </tr>	
		<?php } } }?>
        
        
        <?php 
	        //Search via account name
	       $server->selectDB('logondb');
		   $result = mysql_query("SELECT id FROM account WHERE username LIKE '%".$input."%'");
		   if(mysql_num_rows($result)>0) {
		   $row = mysql_fetch_assoc($result);
		   $server->selectDB('webdb');
		   $result = mysql_query("SELECT * FROM shoplog WHERE shop='".$shop."' AND account='".$row['id']."'"); 
           
            while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
            <td>x<?php echo $row['amount']; ?></td>   
        </tr>	
		<?php } } ?>
        
        
        <?php 
	        //Search via item name
	       $server->selectDB('worlddb');
		   $result = mysql_query("SELECT entry FROM item_template WHERE name LIKE '%".$input."%'");
		   if(mysql_num_rows($result)>0) {
		   $row = mysql_fetch_assoc($result);
		   $server->selectDB('webdb');
		   $result = mysql_query("SELECT * FROM shoplog WHERE shop='".$shop."' AND entry='".$row['entry']."'"); 
           
            while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
            <td>x<?php echo $row['amount']; ?></td>   
        </tr>	
		<?php } } ?>
        
        <?php 
	        //Search via date
			$server->selectDB('webdb');
		    $result = mysql_query("SELECT * FROM shoplog WHERE shop='".$shop."' AND date LIKE '%".$input."%'"); 
           
            while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
            <td>x<?php echo $row['amount']; ?></td>   
        </tr>	
        
        
		<?php } 
		if($input=="Search...") 
		{
			 //View last 10 logs
			$server->selectDB('webdb');
		   $result = mysql_query("SELECT * FROM shoplog WHERE shop='".$shop."' ORDER BY id DESC LIMIT 10"); 
           
            while($row = mysql_fetch_assoc($result)) { ?>
		<tr class="center">
            <td><?php echo $account->getAccName($row['account']); ?></td>
            <td><?php echo $account->getCharName($row['char_id'],$row['realm_id']); ?></td>
            <td><?php echo $server->getRealmName($row['realm_id']); ?></td>
            <td><a href="http://<?php echo $GLOBALS['tooltip_href']; ?>item=<?php echo $row['entry']; ?>" title="" target="_blank">
			<?php echo $server->getItemName($row['entry']); ?></a></td>
            <td><?php echo $row['date']; ?></td>
            <td>x<?php echo $row['amount']; ?></td>   
        </tr>	
			<?php } }
		 ?>
        
</table>
    <?php
}
###############################

?>