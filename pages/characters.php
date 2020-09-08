<?php 
account::isNotLoggedIn();
?>
<?php include "headers.php" ?>
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
<a href="/main/main">
Control Panel </a>
<span class="ico-raquo"></span>
<div>
Your characters </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="#">
Nefelin-WoW </a>
</div>
</div>


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
<a href="?p=characters" class="btn btn-more-big">Show all characters</a>

</section>
</div>
</div>
</div>
</main>
</div>
<?php include "footer.php" ?>