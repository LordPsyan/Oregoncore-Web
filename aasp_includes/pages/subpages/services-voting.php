<?php 
	$page = new page; 
	$server = new server;
	$account = new account;
?> 
<div class="box_right_title">Voting Links</div>
<table class="center">
<tr><th>Title</th><th>Points</th><th>Image</th><th>Url</th><th>Actions</th></tr>
<?php
$server->selectDB('webdb');
$result = mysql_query("SELECT * FROM votingsites ORDER BY id ASC");
while($row = mysql_fetch_assoc($result)) { ?>
	     <tr>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['points']; ?></td>
              <td><img src="<?php echo $row['image']; ?>"></td>
              <td><?php echo $row['url']; ?></td>
              <td><a href="#" onclick="editVoteLink('<?php echo $row['id']; ?>','<?php echo $row['title']; ?>','<?php echo $row['points']; ?>',
              '<?php echo $row['image']; ?>','<?php echo $row['url']; ?>')">Edit</a> 
              <br/> <a href="#" onclick="removeVoteLink('<?php echo $row['id']; ?>')">Remove</a><br />
              </td>   
          </tr>
  <?php 
  }
?>
</table>
<br/>
<a href="#" class="content_hider" onclick="addVoteLink()">Add a new voting site</a>