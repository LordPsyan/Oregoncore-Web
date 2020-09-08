<?php $page = new page;
	  $server = new server; ?>
<div class="box_right_title">Plugins</div>
<table>
	<tr>
    	<th>Name</th>
        <th>Description</th>
        <th>Author</th>
        <th>Created</th>
        <th>Status</th>
    </tr>
<?php
	$bad = array('.','..','index.html');
	
	$folder = scandir('../plugins/');
	foreach($folder as $folderName)
	{
		if(!in_array($folderName,$bad))
		{
			if(file_exists('../plugins/'.$folderName.'/info.php'))
			{
				include('../plugins/'.$folderName.'/info.php');
				?> <tr class="center" onclick="window.location='?p=interface&s=viewplugin&plugin=<?php echo $folderName; ?>'"> <?php
					echo '<td><a href="?p=interface&s=viewplugin&plugin='.$folderName.'">'.$title.'</a></td>';
					echo '<td>'.substr($desc,0,40).'</td>';
					echo '<td>'.$author.'</td>';
					echo '<td>'.$created.'</td>';
					$server->selectDB('webdb');
					$chk = mysql_query("SELECT COUNT(*) FROM disabled_plugins WHERE foldername='".mysql_real_escape_string($folderName)."'");
					if(mysql_result($chk,0)>0)
						echo '<td>Disabled</td>';
					else
						echo '<td>Enabled</td>';
				echo '</tr>';
			}
		}
	}
	
	if($count==0)
	{
		$_SESSION['loaded_plugins'] = NULL;
	}
	else
	{
		$_SESSION['loaded_plugins'] = $loaded_plugins;
	}
?>
</table>