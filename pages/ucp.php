<?php 
account::isNotLoggedIn();
?>
<?php include "headers.php" ?>
<?php include "menus.php" ?>
<main id="content-wrapper">
<div class="container">
<div class="row">
<div class="column">
<div class="head-content">
<div class="breadcrumbs">
<a href="?p=ucp">
Control Panel </a>
<span class="ico-raquo"></span>
<div>
Account </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="#">
Nefelin-WoW </a>
</div>
</div>
<h3 class="main-title">Information</h3>
<div class="general-info">
<div class="item item-1">
<div class="item__info">
<p>E-mail address</p>
<div><?php echo account::getEmail($_SESSION['cw_user']);?></div>
</div>
<a href="?p=settings" class="btn btn-low-yellow">Change</a>
</div>
<div class="item item-2 tfa">
<div class="item__info">
<p>Account Status</p>
<div><span><?php echo account::checkBanStatus($_SESSION['cw_user']);?></span></div>
</div>
<a class="btn btn-low-yellow" href="#">Enable</a> </div>
<div class="item item-3">
<div class="item__info">
<p>Account balance</p>
<div><span class="coin-gold"></span> <span class="count-gold"><?php echo account::loadVP($_SESSION['cw_user']); ?></span></div>
</div>
<a href="?p=donate" class="btn btn-low-yellow">Add</a>
</div>
<div class="item item-4">
<div class="item__info">
<p>Last login</p>
<div><span class="numbers"><?php echo account::getJoindate($_SESSION['cw_user']); ?></span></div>
<p>Last IP</p>
<div><span class="numbers">*********</span></div>
</div>
<a href="?p=changepass" class="btn btn-low-yellow">Change password</a>
</div>
</div>
<section class="extra-info">
</section>

<section class="my-characters">
<h3 class="services character">Your characters on realm <span>Nefelin-WoW </span></h3>
<ul class="character">
<?php 

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
<li class="character_1">
<div class="content">

<img class="class-img" src="https://cp.elysium-project.org/themes/cp_ely/images/classes/2.png" alt="">

<h5><a href="#"><?php echo $row['name']; ?></a></h5>
<ul class="fraction">
<li class="fraction_1">
Faction<br>
<span class="alliance">
Alliance </span>
</li>
<li class="fraction_2">
Class<br>
<img class="class-img" src="/themes/nefelin/images/class/<?php echo $row['class']; ?>.gif" border="none">
</li>
<li class="fraction_3">
Race<br>
<img class="class-img" src="/themes/nefelin/images/race/<?php echo $row['race']; ?>.jpg" border="none">
</li>
<li class="fraction_4">
Level<br>
<span><?php echo $row['level']; ?></span>
</li>
</ul>
<p>Time in game: <span class="time">0 h. 19 m. </span></p>
</div>
<a class="change first" href="?p=work_list">Edit</a> <a class="change last" href="#">Sell</a></li>

<?php 

}
}

?>
</ul>
<a href="#" class="btn btn-more-big">Show all characters</a>

</section>
</div>
</div>
</div>
</main>
</div>
<?php include "footer.php" ?>