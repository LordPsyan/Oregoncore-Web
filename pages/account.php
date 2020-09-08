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

<?php include "right.php" ?>

<section class="main-section with-sidebar">
<div class="newsbox clearfix">
<div class="newsbox clearfix">
<article class="news2 wow bounceInUp first" style="background-image: url(/images/news/183-699-386.jpg)">
<span class="ico-horn"></span>
<div class="date">August 11, 2019, 2:58 PM</div>
<div class="">
<h3 class="title">
<a href="/news/183-Dark+Portal+Opening+Event">
Dark Portal Opening Event </a>
</h3>
<div class="content">
August 11th - 7:00 PM GMT +2
&nbsp;
After years of battling monsters and rival factions on Elysium&rsquo;s Vanilla servers, The Dark Portal will open and allow our heroes to pour into Outland.
&nbsp;
Sunday, August 11th Dark Portal will open to all of Azeroth. Players who are level 60 will finally be able to walk into outland and fight against the Burning Legion </div>
</div>
<div class="readmore">
<div class="fadeout"></div>
<a href="/news/183-Dark+Portal+Opening+Event" class="btn">Read more</a>
</div>
</article>
<article class="news2 wow bounceInUp " style="background-image: url(/images/news/182-334-392.jpg)">
<span class="ico-horn"></span>
<div class="date">August 7, 2019, 1:50 PM</div>
<div class="news-content">
<h3 class="title">
<a href="/news/182-Important%21+TBC+Release+Announcement%2C+timeline+inside%21">
Important! TBC Release Announcement, timeline inside! </a>
</h3>
<div class="content">
Greetings Travelers! We are pleased to announce our timeline for the release of TBC!
Here is our timeline:
- August 8th - Realms go dow </div>
</div>
<div class="readmore">
<div class="fadeout"></div>
<a href="/news/182-Important%21+TBC+Release+Announcement%2C+timeline+inside%21" class="btn">Read more</a>
</div>
</article>
<article class="news2 wow bounceInUp " style="background-image: url(/images/news/180-334-392.jpg)">
<span class="ico-horn"></span>
<div class="date">July 13, 2019, 3:17 PM</div>
<div class="news-content">
<h3 class="title">
<a href="/news/180-News%3A">
News: </a>
</h3>
<div class="content">
The time has come! Join us this Sunday @ 2:00pm GMT to participate in the public stress test of our new TBC realm! Participants are able to win some s </div>
</div>
<div class="readmore">
<div class="fadeout"></div>
<a href="/news/180-News%3A" class="btn">Read more</a>
</div>
</article>
</div>
<div class="readmore">
<a href="https://elysium-project.org/news">All news</a></div>
</div>
</section>
</div>
</div>
</main>


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