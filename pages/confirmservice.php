<?php

$service = $_GET['s'];
$guid = (int)$_GET['guid'];
$realm_id = (int)$_GET['rid'];

$service_title = ucfirst($service." Change");

$service_desc = array(
	'race' 
	=> 
	'<ul>
		<li>You can select a new character race only from those in the same faction that have the character’s class available. You cannot change a characters class.</li>
		<li>A character’s current home city reputation level will switch values with their new home city and their home city racial mounts will convert to those of their new race.</li>
		<li>A realm transfer is not included in a race change.</li>
	</ul>'
,
	'name' 
	=> 
	'<ul>
		<li>A name change can not be reversed once completed, except by a second name change operation (subject to the same costs and limitations).</li>
	</ul>'
,
	'appearance' 
	=> 
	'<ul>
		<li>This service lets you change your character’s gender, face, hair and skin color, hairstyle, name, and other cosmetic features determined by their race and gender combination. You cannot, however, change your character’s race or class.</li>
		<li>If you change the character’s name during this process, the name you choose must be available on the character’s realm.</li>
		<li>A Character Appearance Change cannot be reversed once completed.</li>
	</ul>'
,
	'faction' 
	=> 
	'<ul>
		<li>During this process, you will select a new character race from the opposite-faction races that have the character’s class available. You cannot change a character’s class.</li>
		<li>A realm transfer is not included in a faction change.</li>
	</ul>'
	
	,
	
	'unstuck' 
	=> 
	'<ul>
		<li>test</li>
		<li>test</li>
	</ul>'
			
);

if($GLOBALS['service'][$service]['status']!="TRUE") 
	echo "This page is currently unavailable.";
else
{
?>
<?php include "headers.php" ?>
<script type="text/javascript" src="/javascript/jquery.js"></script>
<script type="text/javascript" src="/javascript/main.js"></script>
<div class="container">
<div class="row">
<ul class="navbar-cp">
<li>
<a href="?p=ucp">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-01.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-01.png" alt="" /> </div>
<p>Account</p>
</a>
</li>
<li>
<a href="?p=shop">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-02.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-02.png" alt="" /> </div>
<p>Shop</p>
</a>
</li>
<li>
<a href="?p=donate">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-03.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-03.png" alt="" /> </div>
<p>Buy coins</p>
</a>
</li>
<li>
<a class="active" href="?p=characters">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-04.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-04.png" alt="" /> </div>
<p>Characters</p>
</a>
</li>
<li>
<a href="#">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-05.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-05.png" alt="" /> </div>
<p>Find character</p>
</a>
</li>
<li>
<a href="?p=stat">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-06.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-06.png" alt="" /> </div>
<p>Statistics</p>
</a>
</li>
<li>
<a href="?p=vote">
<div class="nav-img">
<img src="/themes/cp_nefelin/images/cp-nav-07.png" alt="" /> <img class="hov" src="/themes/cp_nefelin/images/cp-nav-hov-07.png" alt="" /> </div>
<p>Vote</p>
</a>
</li>
</ul>
</div>
</div>
</header>


<main id="content-wrapper">
<div class="container">
<div class="row">
<div class="column">
<div class="head-content">
<div class="breadcrumbs">
<a href="?p=ucp">
Control Panel </a>
<span class="ico-raquo"></span>
<a href="?p=shop">
Shop </a>
<span class="ico-raquo"></span>
<a href="?p=work_list">
Services </a>
<span class="ico-raquo"></span>
<div>
<?php echo $service_title; ?> </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="#">
Nefelin-WoW </a>
</div>
</div>
<div class="content-box standart">
<div class="content-holder">
<div class="content-frame">
<div class="content">
<h2>Select character</h2>
<strong class="title">Your characters on realm <span>Nefelin-WoW </span>:</strong>
<style>
h4 {
    margin: 1px;
    font-size: 18px;
    color: #71B100;
}


span.accept {
    color: #648434;
    border: 1px solid #9BCC54;
    background: #CDEFA6 url(styles/global/images/typo/accept.png) 10px 50% no-repeat;
}

span.attention, span.notice, span.alert, span.download, span.approved, span.media, span.note, span.cart, span.email, span.doc, span.accept, span.vote, span.currency {
    display: block;
    padding: 8px 10px 8px 34px;
    margin: 15px 0;
}


span.currency {
    color: #B79000;
    border: 1px solid #E7BD72;
    background: #FFF3A3 url(styles/global/images/typo/coins.png) 10px 50% no-repeat;
}

span.attention, span.notice, span.alert, span.download, span.approved, span.media, span.note, span.cart, span.email, span.doc, span.accept, span.vote, span.currency {
    display: block;
    padding: 8px 10px 8px 34px;
    margin: 15px 0;
}


span.attention {
    color: #666;
    border: 1px solid #a8a8a8;
    background: #ccc url(styles/global/images/typo/attention.png) 10px 50% no-repeat;
}

span.attention, span.notice, span.alert, span.download, span.approved, span.media, span.note, span.cart, span.email, span.doc, span.accept, span.vote, span.currency {
    display: block;
    padding: 8px 10px 8px 34px;
    margin: 15px 0;
}


</style>
{alert}

<table class="table">
<tr>
<th>img</th>
<th>Name</th>
<th>Level</th>
<th>Race</th>
<th>Class</th>
</tr>

<div class="box_two_title">Confirm <?php echo $service_title; ?></div>
<?php
if($GLOBALS['service'][$service]['price']==0) 
      	echo '<span class="attention">'.$service_title.' is free of charge.</span>';
else
{ ?>
<span class="attention"><?php echo $service_title; ?> costs 
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
	$result = mysql_query("SELECT name FROM realms WHERE id='".$realm_id."'");
	$row = mysql_fetch_assoc($result);
	$realm = $row['name'];
	
	connect::connectToRealmDB($realm_id);
				
	$result = mysql_query("SELECT name,guid,gender,class,race,level,online FROM characters WHERE guid='".$guid."'");
	$row = mysql_fetch_assoc($result)
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


 <!--<td><?php echo $realm; ?>
					<?php if($row['online']==1)
                   echo "<br/><span class='red_text'>Please log out before trying to unstuck.</span>";?>
                </td>-->

</table>
</br>
</div>


&nbsp;
    <h4>Conditions and Disclaimers</h4>
    <?php
	echo $service_desc[$service];
	?>
       <input type="submit" class="btn btn-low-yellow" value="Agree & Continue" 
       <?php if($row['online']==0) { ?> 
       onclick='confirmService(<?php echo $row['guid']; ?>,<?php echo $realm_id; ?>,"<?php echo $service; ?>","<?php echo $service_title; ?>"
       ,"<?php echo $row['name']; ?>")' <?php }
       else { echo 'disabled="disabled"'; } ?>>
    <?php
}
?>

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