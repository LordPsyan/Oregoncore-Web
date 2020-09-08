<?php $page = new page; $server = new server;?>
<div class="box_right_title">Manage Realms</div>
<table class="center">
<tr><th>ID</th><th>Name</th><th>Host</th><th>Port</th><th>Character DB</th><th>Actions</th></tr>
<?php
    $server->selectDB('webdb');
	$result = mysql_query("SELECT * FROM realms ORDER BY id DESC");
	while($row = mysql_fetch_assoc($result)) { ?>
		  <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['host']; ?></td>
              <td><?php echo $row['port']; ?></td>
              <td><?php echo $row['char_db']; ?></td>
              <td><a href="#" onclick="edit_realm(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>','<?php echo $row['host']; ?>',
              '<?php echo $row['port']; ?>','<?php echo $row['char_db']; ?>')">Edit</a> &nbsp; 
              <a href="#" onclick="delete_realm(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>')">Delete</a><br/>
              <a href="#" onclick="edit_console(<?php echo $row['id']; ?>,'<?php echo $row['sendType']; ?>','<?php echo $row['rank_user']; ?>',
			  '<?php echo $row['rank_pass']; ?>')">Edit Console settings</a>
              </td>
          </tr>
	<?php }
?>
</table>