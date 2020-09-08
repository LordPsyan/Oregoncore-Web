<?php 
	$page = new page; 
	
	if(isset($_POST['update_alert']))
	{
		$alert_enable = $_POST['alert_enable'];
		$alert_message = trim($_POST['alert_message']);
		
		$alert_enable =($alert_enable == 'on') ? 'true' : 'false';
		
		$file_content = '<?php

$alert_enabled = '.$alert_enable.';

$alert_message = "'.$alert_message.'";

?>
';
		
		$fp = fopen('../documents/alert.php', 'w');
		if(fwrite($fp, $file_content))
			$msg = 'The alert message was updated!';
		else
			$msg = '[Failure]Could not write to file!';	
			
		fclose($fp);
	}

	include('../documents/alert.php');
?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Alert Message</div>
<form action="?p=interface&s=alert" method="post">
<table>
	<tr>
    	<td>Enable Alert Message</td>
        <td><input name="alert_enable" type="checkbox" <?php if ($alert_enabled==true) echo 'checked'; ?> /></td>
    </tr>
    <tr>
    	<td>Alert Message</td>
        <td><textarea name="alert_message" cols="60" rows="3"><?php echo $alert_message; ?></textarea>
    </tr>
    <tr>
    	<td></td>
        <td><input type="submit" value="Save" name="update_alert">
        <?php
			if(isset($msg))
				echo $msg;
		?>
        </td>
    </tr>
</table>
</td>