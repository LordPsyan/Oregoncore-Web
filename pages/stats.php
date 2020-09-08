<?php 
account::isNotLoggedIn();
?>
<?php include "header.php" ?>
<div class="container">
<div class="row">
<div class="user-panel logged">
<div class="cp-item wow shake">
<span class="cp-icon ico-acc"></span>
<p>Welcome back</p>
<p><span><?php echo ucfirst(strtolower($_SESSION['cw_user']));?></span></p>
<?php 
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['adminPanel_minlvl'] && $GLOBALS['adminPanel_enable']==true) 
				echo ' <a href="admin/">(Admin Panel)</a>';
				
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['staffPanel_minlvl'] && $GLOBALS['staffPanel_enable']==true) 
				echo ' <a href="staff/">(Staff Panel)</a>';
			?>
</div>
<div class="cp-item wow shake">
<span class="cp-icon ico-coins"></span>
<p>Account balance</p>
<p>
<span class="coin-gold"></span> <span class="count-gold"><?php echo account::loadVP($_SESSION['cw_user']); ?></span>
</p>
</div>
<div class="cp-item wow shake">
<span class="cp-icon ico-cp"></span>
<p>Enter to</p>
<p><a href="?p=ucp"><span>Control Panel</span></a></p>
</div>
<div class="cp-item wow shake last">
<?php if(isset($_SESSION['cw_user'])) { ?>
<a href='?p=logout&last_page=<?php echo $_SERVER["REQUEST_URI"]; ?>'><span class="ico-exit"></span></a>
<?php } ?>
</div>
</div>
</div>
</div>
    
<div class="container">
<div class="row">
<aside class="sidebar pull-right wow bounceInRight">

<div class="twitter-widget-holder js-pretty-scroll-light">
test
</div>

<div class="facebook-widget-holder js-pretty-scroll-light">
<div class="fb-container">
<div class="fb-page" data-href="" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-height="3000" data-width="350">
<blockquote cite="" class="fb-xfbml-parse-ignore">
<a href="">Nefelin-WoW Project</a>
</blockquote>
</div>
</div>
</div>

</aside>
<?php

######################################################
# SQL Connection
######################################################
$db_user = "root";
$db_pass = "ascent" ;
$db_host = "87.254.177.88";

######################################################
# VoteShop Website Connection
######################################################

mysql_connect("$db_host","$db_user", "$db_pass");



$arena_top = "characters";

######################################################
# Player Online Table
######################################################

$player_online = "characters";

$uptime = "auth";


?>
<?php
// Uptime
mysql_select_db("$uptime");
$reponse = mysql_query("SELECT uptime, starttime, maxplayers FROM `uptime` ORDER BY `uptime`.`starttime` DESC") or die(mysql_error());
$donnees = mysql_fetch_array($reponse);
$temps = $donnees['uptime'];
$mx = $donnees['maxplayers'];
$day = floor($temps / 86400);
if($day > 0)
$days = $day.'';
else
$days = '0';
$hours = floor(($temps - ($day * 86400)) / 3600);
if($hours < 10)
$hours = ''.$hours;
$min = floor(($temps - (($hours * 3600) + ($day * 86400))) / 60);
if ($min < 10)
$min = "".$min;

$sec = $temps - ($day * 86400) - ($hours * 3600) - ($min * 60);
if ($sec < 10)
$sec = "".$sec;
// Uptime

// online players
mysql_select_db("$player_online");
$sql = "SELECT SUM(online) FROM characters";
$sqlquery = mysql_query($sql) or die(mysql_error());
$memb = mysql_result($sqlquery,0,0); 
$asql = "SELECT SUM(online) FROM characters WHERE race IN(1,3,4,7,11)";
$asqlquery = mysql_query($asql) or die(mysql_error());
$amemb = mysql_result($asqlquery,0,0);  

$hsql = "SELECT SUM(online) FROM characters WHERE race IN(2,5,6,8,10)";
$hsqlquery = mysql_query($hsql) or die(mysql_error());
$hmemb = mysql_result($hsqlquery,0,0); 
$chars = mysql_query("SELECT guid FROM characters");
$char = mysql_num_rows($chars);


mysql_select_db("$uptime");
$selalcm = mysql_query("SELECT id FROM account");
$acc = mysql_num_rows($selalcm);


$da = mysql_query("SELECT COUNT(*) FROM account WHERE last_login LIKE '%".date('Y-m-d')."%'");
$daaa = mysql_result($da,0);

$da2 = mysql_query("SELECT COUNT(id) FROM account WHERE online=1");
$daa2 = mysql_result($da2,0);

$da3 = mysql_query("SELECT COUNT(id) FROM account WHERE joindate LIKE '%".date("Y-m-d")."%'");
$daa3 = mysql_result($da3,0);

$da4 = mysql_query("SELECT COUNT(id) FROM account WHERE last_login LIKE '%".date("Y-m")."%'");
$daa4 = mysql_result($da4,0);

// online players
?>

<section class="main-section with-sidebar">
<div class="newsbox clearfix">
<section class="inner_about">
<div class="table">
<h2>Server Statistics</h2>
<table class="spoiler">
<p>Accounts Registered: <?php echo ''.$acc.''; ?></p>
<p>Unique Players per day: <?php echo ''.$daa4.''; ?></p>
<p>Accounts Created per day: <?php echo ''.$daa3.''; ?></p>

<br>
<table class="spoiler">
<center><img src="/themes/nefelin/images/wow_tbc_logo.png" width="250">
<h2>Statistic of realms with version 2.4.3 (TBC)</h2></center>
<tr>
<th>Realm</th>
<th>Status</th>
<th>Online</th>
<th>Online Max</th>
<th>Chars</th>
<th>Uptime</th>
</tr>
<tr>
<td><a href="#" class="spoiler-button">Stormrage</a></td>
<td>Online</td>
<td><?php echo $memb; ?></td>
<td><?php echo "$mx"; ?></td>
<td><?php echo ''.$char.''; ?></td>
<td><?php echo "$days"; ?> d. <?php echo "$hours"; ?> h. <?php echo "$min"; ?> m. <?php echo "$sec"; ?> s.</td>
</tr>
<tr>
<td colspan="6">
<table>
<tr>
<th>Alliance</th>
<th>Horde</th>
<th>Queue</th>
<th>Connections</th>
<th>Uptime</th>
</tr>
<tr>
<td>
<img src="/images/alliance_small.png" /> <?php echo $amemb; ?> </td>
<td>
<img src="/images/horde_small.png" /> <?php echo $hmemb; ?> </td>
<td>No</td>
<td><?php echo ''.$daa2.''; ?></td>
<td><?php echo "$days"; ?> d. <?php echo "$hours"; ?> h. <?php echo "$min"; ?> m. <?php echo "$sec"; ?> s. &nbsp;ago</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</section>
</div>
</section>
</div>
</div>
</main>
</div>

<footer id="footer">
<div class="container">
<div class="row clearfix">
<div class="column">
<div id="footer-copy" class="wow fadeInUp">
&copy; 2018 - 2019 <br />
<a href="./">Nefelin-WoW Project, Vanilla Legacy Server</a> 
<a class="legals" href="">Contact us - About us</a> 
<a class="legals" href="">Refund policy / private policy</a> 
</div></div></div></div>
</div>
</div>
</div>
</footer>
<script type="text/javascript" src="/themes/nefelin/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/themes/nefelin/js/custom.js"></script>