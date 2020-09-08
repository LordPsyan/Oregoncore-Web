<?php $page = new page; $server = new server; ?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Slideshow</div>
<?php 
if($GLOBALS['enableSlideShow']==true) 
$status = 'Enabled';
else
$status = 'Disabled';

$server->selectDB('webdb');
$count = mysql_query("SELECT COUNT(*) FROM slider_images");
?>
The slideshow is <b><?php echo $status; ?></b>. You have <b><?php echo round(mysql_result($count,0)); ?></b> images in the slideshow.
<hr/>
<?php 
if(isset($_POST['addSlideImage']))
{
	$page = new page;
	$page->addSlideImage($_FILES['slideImage_upload'],$_POST['slideImage_path'],$_POST['slideImage_url']);
}
?>
<a href="#addimage" onclick="addSlideImage()" class="content_hider">Add image</a>
<div class="hidden_content" id="addSlideImage">
<form action="" method="post" enctype="multipart/form-data">
Upload an image:<br/>
<input type="file" name="slideImage_upload"><br/>
or enter image URL: (This will override your uploaded image)<br/>
<input type="text" name="slideImage_path"><br/>
Where should the image redirect? (Leave empty if no redirect)<br/>
<input type="text" name="slideImage_url"><br/>
<input type="submit" value="Add" name="addSlideImage">
</form>
</div>
<br/>&nbsp;<br/>
<?php 
$server->selectDB('webdb');
$result = mysql_query("SELECT * FROM slider_images ORDER BY position ASC");
if(mysql_num_rows($result)==0) 
{
	echo "You don't have any images in the slideshow!";
}
else 
{
	echo '<table>';
	$c = 1;
	while($row = mysql_fetch_assoc($result))
	{
		echo '<tr class="center">';
		echo '<td><h2>&nbsp; '.$c.' &nbsp;</h2><br/>
		<a href="#remove" onclick="removeSlideImage('.$row['position'].')">Remove</a></td>';
		echo '<td><img src="../'.$row['path'].'" alt="'.$c.'" class="slide_image" maxheight="200"/></td>';
		echo '</tr>';
		$c++;
	}
	  echo '</table>';
}
?>

