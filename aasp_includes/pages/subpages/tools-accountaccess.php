<?php 
$server = new server;
$account = new account;
$page = new page;

$page->validatePageAccess('Tools->Account Access');

?>
<div class="box_right_title">Account Access</div>
All GM accounts are listed below.
<br/>&nbsp;
<table>
	<tr>
    	<th>ID</th>
        <th>Username</th>
        <th>Rank</th>
        <th>Realms</th>
        <th>Status</th>
        <th>Last Login</th>
        <th>Actions</th>
    </tr>
    <?php
	$server->selectDB('logondb');
	$result = mysql_query("SELECT * FROM account_access");
	if(mysql_num_rows($result)==0) 
	 	echo "<b>No GM accounts found!</b>";	
	else
	{
		while($row = mysql_fetch_assoc($result)) 
		{
			?>
            <tr style="text-align:center;">
            	<td><?php echo $row['id']; ?></td>
                <td><?php echo $account->getAccName($row['id']); ?></td>
                <td><?php echo $row['gmlevel']; ?></td>
                <td>
                <?php 
					if($row['RealmID']=='-1')
						echo 'All';
					else
					{
						$getRealm = mysql_query("SELECT name FROM realmlist WHERE id='".$row['RealmID']."'");
						if(mysql_num_rows($getRealm)==0)
							echo 'Unknown';
						$rows = mysql_fetch_assoc($getRealm);
						echo $rows['name'];
					}
				?>
                </td>
                <td>
                <?php
					$getData = mysql_query("SELECT last_login,online FROM account WHERE id='".$row['id']."'");
					$rows = mysql_fetch_assoc($getData);
					if($rows['online']==0)
					 	echo '<font color="red">Offline</font>';
					else
						echo '<font color="green">Online</font>';	
				?>
                </td>
                <td>
                <?php
				 	echo $rows['last_login'];
				?>
                </td>
                <td>
                	<a href="#" onclick="editAccA(<?php echo $row['id']; ?>,<?php echo $row['gmlevel']; ?>,<?php echo $row['RealmID']; ?>)">Edit</a>
              		&nbsp;
                    <a href="#" onclick="removeAccA(<?php echo $row['id']; ?>)">Remove</a>
                </td>
            </tr>
            <?php
		}
		
	}
	?>
</table>
<hr/>
<a href="#" class="content_hider" onclick="addAccA()">Add account</a>