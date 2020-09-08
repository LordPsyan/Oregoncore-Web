<?php account::isNotLoggedIn(); ?>
<?php include "headers.php" ?>
<?php include "menus.php" ?>
<main id="content-wrapper">
<div class="container">
<div class="row">
<div class="column">
<div class="head-content">
<div class="breadcrumbs">
<a href="/main/main">
Control Panel </a>
<span class="ico-raquo"></span>
<a href="https://cp.elysium-project.org/shop">
Shop </a>
<span class="ico-raquo"></span>
<a href="https://cp.elysium-project.org/game/work_list">
Services </a>
<span class="ico-raquo"></span>
<div>
Unstuck character </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="https://elysium-project.org/main/realm">
Nefelin </a>
</div>
</div>
<div class="content-box standart">
<div class="content-holder">
<div class="content-frame">
<div class="content">
<h2>Select character</h2>
<strong class="title">Your characters on realm <span>Nefelin </span>:</strong>

{alert}

<table class="table">
<tr>
<th>img2</th>
<th>img</th>
<th>Name</th>
<th>Level</th>
<th>Race</th>
<th>Class</th>
<th>Time in game</th>
<th>&nbsp;</th>
</tr>
<?php 

$service = "teleport";

if($GLOBALS['service'][$service]['price']==0) 
      echo '<span class="attention">Teleportation is free of charge.</span>';
else
{ ?>
<span class="attention">Teleportation costs 
<?php 
echo $GLOBALS['service'][$service]['price'].' '.website::convertCurrency($GLOBALS['service'][$service]['currency']); ?></span>
<?php 
if($GLOBALS['service'][$service]['currency']=="vp")
	echo "<span class='currency'>Vote Points: ".account::loadVP($_SESSION['cw_user'])."</span>";
elseif($GLOBALS['service'][$service]['currency']=="dp")
	echo "<span class='currency'>".$GLOBALS['donation']['coins_name'].": ".account::loadDP($_SESSION['cw_user'])."</span>";
} ?>
<hr/>
<h3 id="choosechar">Choose Character</h3> 
<?php
connect::selectDB('webdb');
$result = mysql_query('SELECT char_db,name FROM realms ORDER BY id ASC');
while($row = mysql_fetch_assoc($result)) 
{
         $acct_id = account::getAccountID($_SESSION['cw_user']);
		 $realm = $row['name'];
		 $char_db = $row['char_db'];
		          	
		connect::selectDB($char_db);
		$result = mysql_query('SELECT name,guid,gender,class,race,level,online FROM characters WHERE account='.$acct_id);
		while($row = mysql_fetch_assoc($result)) {
	?>
   

<div class='charBox' style="cursor:pointer;" id="<?php echo $row['guid'].'*'.$char_db; ?>"<?php if ($row['online'] != 1) { ?> onclick="selectChar('<?php echo $row['guid'].'*'.$char_db; ?>',this)"<?php } ?>>


	<table>
<tr>
<td><?php if(!file_exists('styles/global/images/portraits/'.$row['gender'].'-'.$row['race'].'-'.$row['class'].'.gif'))
				       echo '<img src="styles/'.$GLOBALS['template']['path'].'/images/unknown.png" />';
					   else 
					   { ?>
				   <img src="styles/global/images/portraits/<?php echo $row['gender'].'-'.$row['race'].'-'.$row['class']; ?>.gif" border="none">
                </td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['level']; ?></td>
<td><?php echo "".character::getRace($row['race']); ?></td>
<td><?php echo "".character::getClass($row['class']); ?></td>
<td></td>
<td></td>
<td><?php } ?>Continue</a></td>
</tr>

</div>  
	</table>
	<?php } ?>
<br/>&nbsp;
    <span id="teleport_to" style="display:none;">  
     
    </span>      
</div>

</br>
</div>
<span class="image"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<?php include "footer.php" ?>
<?php
}
?>