<?php 
 require("includes/classes/template_parse.php"); 

 $getTemplate = mysql_query("SELECT path FROM template WHERE applied='1' ORDER BY id ASC LIMIT 1");
 $row = mysql_fetch_assoc($getTemplate);
 
 $template['path']=$row['path'];
 
 
 if(!file_exists("styles/".$template['path']."/style.css") || !file_exists("styles/".$template['path']."/template.html")) 
 {
	 buildError("<b>Template Error: </b>The active template does not exist or missing files.",NULL);
	 exit_page();
 }
 
 ?>
<link rel="stylesheet" href="styles/<?php echo $template['path']; ?>/style.css" />

<?php
	plugins::load('styles');
?>