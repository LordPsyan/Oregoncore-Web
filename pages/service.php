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
<div>
Services </div>
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
<strong class="title">Your characters on realm <span>Nefelin </span>:</strong>
<style>
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
<th>&nbsp;</th>
</tr>
</br>
<?php

$service = $_GET['s'];

$service_title = ucfirst($service." Change");

if($GLOBALS['service'][$service]['status']!="TRUE") 
	echo "This page is currently unavailable.";
else
{
	if(isset($_GET['service'])&&$_GET['service']=='applied')
	{
		echo '<div class="box_two_title">Service applied!</div>';
		echo 'Your service has been applied to the character you just selected. You may have to relog your account to notice any changes.';
		echo '<p/>This action has been logged in our database incase you need any assistance.';
	}
	else
	{
?>


Choose which character you wish to apply this service to.
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
$num = 0;
$result = mysql_query('SELECT char_db,name,id FROM realms ORDER BY id ASC');
while($row = mysql_fetch_assoc($result)) 
{
         $acct_id = account::getAccountID($_SESSION['cw_user']);
		 $realm = $row['name'];
		 $char_db = $row['char_db'];
		 $realm_id = $row['id'];
		          	
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


 <!--<td><?php echo $realm; ?>
					<?php if($row['online']==1)
                   echo "<br/><span class='red_text'>Please log out before trying to unstuck.</span>";?>
                </td>-->
                
				
				<td align="right"> &nbsp; <input type="submit" class="btn btn-low-yellow" value="Select" 
				   <?php if($row['online']==0) { ?> 
                   onclick='nstepService(<?php echo $row['guid']; ?>,<?php echo $realm_id; ?>,"<?php echo $service; ?>","<?php echo $service_title; ?>"
                   ,"<?php echo $row['name']; ?>")' <?php }
                   else { echo 'disabled="disabled"'; } ?>>
               </td>
            </tr>      
	
	<?php 
		$num++;
	}
   }
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