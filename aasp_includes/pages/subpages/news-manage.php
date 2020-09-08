<?php
$server = new server;
$server->selectDB('webdb');
$result = mysql_query("SELECT * FROM news ORDER BY id DESC");
if(mysql_num_rows($result)==0)
{ 
echo "<span class='blue_text'>No news has been posted yet!</span>"; 
}
else { 
?>
<div class="box_right_title">News &raquo; Manage</div>
<table width="100%">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Comments</th>
    <th>Actions</th>
</tr>
<?php
while($row=mysql_fetch_assoc($result)) {
	$comments = mysql_query("SELECT COUNT(id) FROM news_comments WHERE newsid='".$row['id']."'");
	 echo '<tr class="center">
			   <td>'.$row['id'].'</td>
			   <td>'.$row['title'].'</td>
			   <td>'.substr($row['body'],0,25).'...</td>
			   <td>'.mysql_result($comments,0).'</td>
			   <td> <a onclick="editNews('.$row['id'].')" href="#">Edit</a> &nbsp;  
			   <a onclick="deleteNews('.$row['id'].')" href="#">Delete</a></td>
	 </tr>';
}
?></table><?php
}
 ?>    
