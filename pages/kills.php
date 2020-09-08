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
<a href="?p=characters">
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
<a class="active" href="?p=stat">
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
<a href="https://cp.elysium-project.org/stat">
Statistics </a>
<span class="ico-raquo"></span>
<div>
Honor Ranking </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="https://elysium-project.org/main/realm">
Nefelin-WoW </a>
</div>
</div>
<div class="content-box standart">
<div class="content-holder">
<div class="content-frame">
<div class="content">
<h2>Honor Ranking</h2>
<br />

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
mysql_select_db("$arena_top");
$a=0;
$result = mysql_query("SELECT `name`, `race`, `class`, `gender`, `level`, totalKills, totalHonorPoints, totaltime FROM `characters` ORDER BY `totalKills` DESC LIMIT 5;");

$msg = mysql_num_rows($result);
 if (!$msg){ 
     echo '
<table class="table">
<tr>
<th>#</th>
<th>Nickname</th>
<th>Level</th>
<th>Faction</th>
<th>Total Kills</th>
</tr>
<center><br />No TOP 5 PVP!</center>
';}else{
echo '
<table class="table">
<tr>
<th>#</th>
<th>Nickname</th>
<th>Level</th>
<th>Faction</th>
<th>Total Kills</th>
</tr>
';
 while ($row = mysql_fetch_array ($result))

   {
	   
if ($a<=5)
$a=$a+1;

      if($row['race']=="1" or $row['race']=="3" or $row['race']=="4" or $row['race']=="7" or  $row['race']=="11")
       {$faction = "<img src='images/icons/faction_alliance.gif' width='20' height='20' alt='Aliance'/>";}
       else{$faction = "<img src='images/icons/faction_horde.gif' width='20' height='20' alt='Horde'/>";}
	   
	   if($row['race']=="1" or $row['race']=="3" or $row['race']=="4" or $row['race']=="7" or  $row['race']=="11")
       {$faction2 = "Aliance";}
       else{$faction2 = "Horde";}
   
echo '


<tr>
<td>'.$a.'</td>
<td>
<div class="pull-right">'.$faction.'</div>
<a href="https://cp.elysium-project.org/armory/char-1-5326438">'.$row['name'].'</a> </td>
<td>'.$row['level'].'</td>
<td>'.$faction2.'</td>
<td>
'.$row['totalKills'].' </td>
</tr>

';}}
?>
</table>
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