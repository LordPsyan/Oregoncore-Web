<?php include "headers.php" ?>
<?php include "menus.php" ?>
<script type="text/javascript" src="http://lastwow.net/javascript/jquery.js"></script>
<script type="text/javascript" src="http://lastwow.net/javascript/main.js"></script>
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
<th>img</th>
<th>Name</th>
<th>Level</th>
<th>Race</th>
<th>Class</th>
<th>Time in game</th>
<th>&nbsp;</th>
</tr>
<?php 

$service = "revive";

if($GLOBALS['service'][$service]['price']==0) 
      echo '<span class="attention">Revive is free of charge.</span>';
else
{ ?>
<span class="attention">Revive costs 
<?php 
echo $GLOBALS['service'][$service]['price'].' '.website::convertCurrency($GLOBALS['service'][$service]['currency']); ?></span>
<?php 
if($GLOBALS['service'][$service]['currency']=="vp")
	echo "<span class='currency'>Vote Points: ".account::loadVP($_SESSION['cw_user'])."</span>";
elseif($GLOBALS['service'][$service]['currency']=="dp")
	echo "<span class='currency'>".$GLOBALS['donation']['coins_name'].": ".account::loadDP($_SESSION['cw_user'])."</span>";
} 

account::isNotLoggedIn();
connect::selectDB('webdb');
$num = 0;
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
	
	<tr>
<td><?php if(!file_exists('styles/global/images/portraits/'.$row['gender'].'-'.$row['race'].'-'.$row['class'].'.gif'))
				       echo '<img src="styles/'.$GLOBALS['template']['path'].'/images/unknown.png" />';
					   else 
					   { ?>
                        <img src="styles/global/images/portraits/
					<?php echo $row['gender'].'-'.$row['race'].'-'.$row['class']; ?>.gif" border="none">
                    <?php } ?>
                </td></td>
				

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['level']; ?></td>
<td><?php echo "".character::getRace($row['race']); ?></td>
<td><?php echo "".character::getClass($row['class']); ?></td>
<td>0 h. 19 m. 34 s.</td>

 <!--<td><?php echo $realm; ?>
					<?php if($row['online']==1)
                   echo "<br/><span class='red_text'>Please log out before trying to unstuck.</span>";?>
                </td>-->
                
				
				
				 <td align="right"> &nbsp; <input type="submit" class="btn btn-low-yellow" value="Revive" 
				   <?php if($row['online']==0) { ?> 
                   onclick='revive(<?php echo $row['guid']; ?>,"<?php echo $char_db; ?>")' <?php }
                   else { echo 'disabled="disabled"'; } ?>>
               </td>
	
</tr>


	<?php 
		$num++;
	}
}
?>
</table>
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