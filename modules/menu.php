<?php
connect::selectDB('webdb');
if (!isset($_SESSION['cw_user'])) 
	$sql = "WHERE shownWhen = 'always' OR shownWhen = 'notlogged'"; 
else 
	$sql = "WHERE shownWhen = 'always' OR shownWhen = 'logged'";
			 		
 $getMenuLinks = mysql_query("SELECT * FROM site_links ".$sql." ORDER BY position ASC");
 if (mysql_num_rows($getMenuLinks)==0) 
 {
	 buildError("<b>Template error:</b> No menu links was found in the CraftedWeb database!",NULL);
	 echo "<br/>No menu links was found!";
 }
		 
 while($row = mysql_fetch_assoc($getMenuLinks)) 
 {
	 $curr = substr($row['url'],3);
	 if ($_GET['p']==$curr)
		 echo '<a href="',$row['url'],'" class="current">',$row['title'],'</a>';
	 else
		 echo '<a href="',$row['url'],'">',$row['title'],'</a>';
 }
?>