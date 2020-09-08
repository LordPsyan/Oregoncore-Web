<?php
define('INIT_SITE', TRUE);
include('../../includes/misc/headers.php');
include('../../includes/configuration.php');
include('../functions.php');
$server = new server;
$account = new account;

$server->selectDB('webdb');

###############################
if($_POST['function']=='post') 
{
	if(empty($_POST['title']) || empty($_POST['author']) || empty($_POST['content']))
		die('<span class="red_text">Please enter all fields.</span>');

	mysql_query("INSERT INTO news VALUES ('','".mysql_real_escape_string($_POST['title'])."','".mysql_real_escape_string($_POST['content'])."',
	'".mysql_real_escape_string($_POST['author'])."','".mysql_real_escape_string($_POST['image'])."',
	'".date("Y-m-d H:i:s")."')");
	$server->logThis("Posted a news post");
	echo "Successfully posted news.";
}
################################
elseif($_POST['function']=='delete') 
{
	if(empty($_POST['id']))
		die('No ID specified. Aborting...');

	mysql_query("DELETE FROM news WHERE id='".mysql_real_escape_string($_POST['id'])."'");
	mysql_query("DELETE FROM news_comments WHERE id='".mysql_real_escape_string($_POST['id'])."'");
	$server->logThis("Deleted a news post");
}
##############################
elseif($_POST['function']=='edit') 
{
	$id = (int)$_POST['id'];
	$title = ucfirst(mysql_real_escape_string($_POST['title']));
	$author = ucfirst(mysql_real_escape_string($_POST['author']));
	$content = mysql_real_escape_string($_POST['content']);
	
	if(empty($id) || empty($title) || empty($content))
	 	die("Please enter both fields.");
    else 
	{
		mysql_query("UPDATE news SET title='".$title."', author='".$author."', body='".$content."' WHERE id='".$id."'");
		$server->logThis("Updated news post with ID: <b>".$id."</b>");
		return;
	}
}
#############################
elseif($_POST['function']=='getNewsContent') 
{
	$result = mysql_query("SELECT * FROM news WHERE id='".(int)$_POST['id']."'");
	$row = mysql_fetch_assoc($result);
	$content = str_replace('<br />', "\n", $row['body']);
	
	echo "Title: <br/><input type='text' id='editnews_title' value='".$row['title']."'><br/>Content:<br/><textarea cols='55' rows='8' id='editnews_content'>"
	.$content."</textarea><br/>Author:<br/><input type='text' id='editnews_author'><br/><input type='submit' value='Save' onclick='editNewsNow(".$row['id'].")'>";
}

?>