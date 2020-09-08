<?php if (!isset($_SESSION['cw_user'])) { 
 	  if (isset($_POST['login'])) 
	  	account::logIn($_POST['login_username'],$_POST['login_password'],$_SERVER['REQUEST_URI'],$_POST['login_remember']);
?>

<link href="css/jquery.fancybox.css" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<style>
.game-versions {
    font-size: 40px;
    font-family: frizquadratac,sans-serif;
    color: #fff;
    text-decoration: none;
}

.game-versions .game-versions-text {
    position: relative;
    top: 10px;
	}
</style>
<body>
<div class="wrapper">

<header id="header">
<section class="section home" id="home">
<div class="container">
<div class="navbar-toggle">
<span class="burger"></span>
</div>
<div class="slogan">
Open Beta Testing
</div>

<nav class="navbar clearfix" role="navigation">
<ul class="nav navbar-nav clearfix">
<li class="active">
<a href="#home"><span class="text">Home</span><span class="ico"><img src="/images/nav-side.png" alt=""></span></a>
</li>
<li>
<a href="#about"><span class="text">About us</span><span class="ico"><img src="/images/nav-side-03.png" alt=""></span></a>
</li>
<li>
<a href="#classes"><span class="text">Why Progressive?</span><span class="ico"><img src="/images/nav-side-04.png" alt=""></span></a>
</li>
<li>
<a href="#why"><span class="text">Why TBC?</span><span class="ico"><img src="/images/nav-side-05.png" alt=""></span></a>
</li>
<li>
<a href="#raids"><span class="text">Raids</span><span class="ico"><img src="/images/nav-side-06.png" alt=""></span></a>
</li>
<li>
<a href="#betakey"><span class="text">Registration</span><span class="ico"><img src="/images/nav-side-07.png" alt=""></span></a>
</li>
</ul>
<div class="socials">
<a href="#" class="wow bounceInLeft"><img src="/images/ico-fb.png" alt=""></a>
<a href="#" class="wow bounceInRight"><img src="/images/ico-tw.png" alt=""></a>
<a href="#" class="wow bounceInLeft"><img src="/images/ico-vk.png" alt=""></a>
<a href="#" class="wow bounceInRight"><img src="/images/ico-yt.png" alt=""></a>
</div>
<div class="languages wow lightSpeedIn">
<a href="/main/index.html" class="en active"></a>
<a href="/ru/main/index.html" class="ru"></a>
</div>
</nav>
<div class="brand">
<a class="logo" href=""><img src="/images/nefelin_logo_tbc.png" class="wow swing" alt="logo" role="banner" style="visibility: visible; animation-name: swing;"></a>
</div>
<div class="video">
<a href="https://www.youtube.com/watch?v=IBHL_-biMrQ" class="various fancybox-media play wow flip"><img src="/images/play.png" alt=""></a>
</div>
<div class="buttons clearfix">
<div class="rcol text-left wow bounceInLeft"><a href="#" class="btn scrollToForm" data-target="betakey-content">Play Now</a></div>
<div class="rcol text-right wow bounceInRight"><a href="https://discord.gg/ptJVrp" class="btn">Discord</a></div>
</div>
</div>
</section>
</header>

<main id="content-wrapper">
<section class="section about" id="about">
<div class="container">
<h3 class="section-title wow pulse">About our project</h3>
<article class="section-text wow flipInX">
<p>Like you, the staff here at <strong>Nefelin-WoW Project</strong> have explored and conquered the vastness of World of Warcraft. And also like you, our love of the game grew and grew. So much, in fact, we desired to revive those emotions and moments experienced during the first WoW expansion... <strong>The Burning Crusade</strong>.</p>
<p>However, we could not find a suitable place to relive all those unforgettable moments... so we decided to do it ourselves! And now, after 5 years of active development, we are finally ready to introduce our project... to YOU.</p>
</article>
<div class="row items">
<div class="col wow wobble">
<div class="block">
<div class="img">
<img src="/images/pref/pref-02.png" alt="">
<img src="/images/pref/pref-hov-02.png" class="hov" alt="">
</div>
<h4 class="title">Pathfinding</h4>
<div class="text">Every unit (creature, npc, pet) calculates path to reach their target without falling under textures, going through pillars etc.</div>
</div>
</div>
<div class="col wow tada">
<div class="block">
<div class="img">
<img src="/images/pref/pref-11.png" alt="">
<img src="/images/pref/pref-hov-11.png" class="hov" alt="">
</div>
<h4 class="title">Copy characters from Nefelin</h4>
<div class="text">You can copy your characters from Nefelin to play on TBC, your characters will still exist on vanilla, so you can select where to play.</div>
</div>
</div>




<div class="col wow tada">
<div class="block">
<div class="img">
<img src="/images/pref/pref-07.png" alt="">
<img src="/images/pref/pref-hov-07.png" class="hov" alt="">
</div>
<h4 class="title">Automatic backup system</h4>
<div class="text">Transports backups every day from main server to others. It backups the full server and all your characters every day. </div>
</div>
</div>
<div class="col wow wobble">
<div class="block">
<div class="img">
<img src="/images/pref/pref-08.png" alt="">
<img src="/images/pref/pref-hov-08.png" class="hov" alt="">
</div>
<h4 class="title">DDOS Protection</h4>
<div class="text">We have a large experience in servers’ protection, so you can be sure that server will be uptime 99.9%.</div>
</div>
</div>
<div class="col wow tada">
<div class="block">
<div class="img">
<img src="/images/pref/pref-09.png" alt="">
<img src="/images/pref/pref-hov-09.png" class="hov" alt="">
</div>
<h4 class="title">Good Latency</h4>
<div class="text">Our servers have 1Gbps internet connection, with it you will never have problems with connection or lags.</div>
</div>
</div>
<div class="col wow wobble">
<div class="block">
<div class="img">
<img src="/images/pref/pref-10.png" alt="">
<img src="/images/pref/pref-hov-10.png" class="hov" alt="">
</div>
<h4 class="title">Multilanguage support</h4>
<div class="text">Our team is very big and at the moment we provide support on English and Russian languages, feel free to contact us if you have any problems.</div>
</div>
</div>
</div>
</div>
</section>
<section class="section classes" id="classes">
<div class="container">
<div class="text-block">
<h3 class="section-title wow pulse">Why Progressive?</h3>
<article class="section-text wow flipInX">
<p>To begin, we answer the question: "What does «Progressive World?» mean?" This is a world in which all PvE content becomes available gradually. This means that you will not be able to visit the «Black Temple» or «Sunwell Plateau» immediately at server opening. We believe this method of release allows our community to more thoroughly enjoy «The Burning Crusade» and provides the best experience of of the expansion.</p>
</article>
</div>
<div class="row">
<div class="class-tabs">

<ul class="nav-tabs clearfix" role="tablist">
<li role="presentation" class="active wow bounceInLeft">
<a href="#class-warrior" aria-controls="class-warrior" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-01.png" alt="">
<img src="/images/class/class-hov-01.png" class="hov" alt="">
</div>
Warrior
</a>
</li>
<li role="presentation" class="wow bounceInDown">
<a href="#class-hunter" aria-controls="class-hunter" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-02.png" alt="">
<img src="/images/class/class-hov-02.png" class="hov" alt="">
</div>
Hunter
</a>
</li>
<li role="presentation" class="wow bounceInLeft">
<a href="#class-priest" aria-controls="class-priest" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-03.png" alt="">
<img src="/images/class/class-hov-03.png" class="hov" alt="">
</div>
Priest
</a>
</li>
<li role="presentation" class="wow bounceInUp">
<a href="#class-shaman" aria-controls="class-shaman" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-04.png" alt="">
<img src="/images/class/class-hov-04.png" class="hov" alt="">
</div>
Shaman
</a>
</li>
<li role="presentation" class="wow bounceIn">
<a href="#class-warlock" aria-controls="class-warlock" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-05.png" alt="">
<img src="/images/class/class-hov-05.png" class="hov" alt="">
</div>
Warlock
</a>
</li>
<li role="presentation" class="wow bounceInUp">
<a href="#class-druid" aria-controls="class-druid" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-06.png" alt="">
<img src="/images/class/class-hov-06.png" class="hov" alt="">
</div>
Druid
</a>
</li>
<li role="presentation" class="wow bounceInLeft">
<a href="#class-paladin" aria-controls="class-paladin" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-07.png" alt="">
<img src="/images/class/class-hov-07.png" class="hov" alt="">
</div>
Paladin
</a>
</li>
<li role="presentation" class="wow bounceInDown">
<a href="#class-rogue" aria-controls="class-rogue" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-08.png" alt="">
<img src="/images/class/class-hov-08.png" class="hov" alt="">
</div>
Rogue
</a>
</li>
<li role="presentation" class="wow bounceInRight">
<a href="#class-mage" aria-controls="class-mage" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/class/class-09.png" alt="">
<img src="/images/class/class-hov-09.png" class="hov" alt="">
</div>
Mage
</a>
</li>
</ul>
</div>
</div>
<div class="row tabs-row">

<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="class-warrior">
<div class="class-item">
<img src="/images/class/warrior-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/warrior-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/warrior-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-hunter">
<div class="class-item">
<img src="/images/class/hunter-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/hunter-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/hunter-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-priest">
<div class="class-item">
<img src="/images/class/priest-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/priest-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/priest-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-shaman">
<div class="class-item">
<img src="/images/class/shaman-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/shaman-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/shaman-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-warlock">
<div class="class-item">
<img src="/images/class/warlock-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/warlock-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/warlock-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-druid">
<div class="class-item">
<img src="/images/class/druid-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/druid-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/druid-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-paladin">
<div class="class-item">
<img src="/images/class/paladin-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/paladin-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/paladin-03.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-rogue">
<div class="class-item">
<img src="/images/class/rogue-01-new.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/rogue-02-new.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/rogue-03-new.png" alt="">
Tier <span class="numbers">6</span>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="class-mage">
<div class="class-item">
<img src="/images/class/mage-01.png" alt="">
Tier <span class="numbers">4</span>
</div>
<div class="class-item">
<img src="/images/class/mage-02.png" alt="">
Tier <span class="numbers">5</span>
</div>
<div class="class-item">
<img src="/images/class/mage-03.png" alt="">
 Tier <span class="numbers">6</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="section why" id="why">
<div class="container">
<h3 class="section-title wow pulse">Why The Burning Crusade?</h3>
<article class="section-text wow flipInX">
<p>The legendary patch that won many hearts. According to many players, The Burning Crusade is the best expansion in the history of World of Warcraft.</p>
<p>Its balance between the classes, exciting dungeons & raids, unique and beautiful environments, and many interesting experiences lend to this view.</p>
</article>
<div class="why-items">
<div class="col wow bounceInRight">
<div class="img">
<img src="/images/why/why-01.png" alt="">
<img src="/images/why/why-hov-01.png" class="hov" alt="">
</div>
<div class="text">Take a part in 9 raids</div>
</div>
<div class="col wow bounceInRight">
<div class="img">
<img src="/images/why/why-02.png" alt="">
<img src="/images/why/why-hov-02.png" class="hov" alt="">
</div>
<div class="text">Battle to Level 70</div>
</div>
<div class="col wow bounceInLeft">
<div class="img">
<img src="/images/why/why-03.png" alt="">
<img src="/images/why/why-hov-03.png" class="hov" alt="">
</div>
<div class="text">Implemented team PvP arena system</div>
</div>
<div class="col wow bounceInLeft">
<div class="img">
<img src="/images/why/why-04.png" alt="">
<img src="/images/why/why-hov-04.png" class="hov" alt="">
</div>
<div class="text">Flying mounts</div>
</div>
<div class="col wow bounceInUp">
<div class="img">
<img src="/images/why/why-05.png" alt="">
<img src="/images/why/why-hov-05.png" class="hov" alt="">
</div>
<div class="text">New races Blood Elf and Draenei</div>
</div>
<div class="col wow bounceInDown">
<div class="img">
<img src="/images/why/why-06.png" alt="">
<img src="/images/why/why-hov-06.png" class="hov" alt="">
</div>
<div class="text">New battleground Eye of the Storm</div>
</div>
<div class="col wow bounceInUp">
<div class="img">
<img src="/images/why/why-07.png" alt="">
<img src="/images/why/why-hov-07.png" class="hov" alt="">
</div>
<div class="text">New continent Outland</div>
</div>
</div>
</div>
</section>
<section class="section raids" id="raids">
<div class="container">
<h3 class="section-title">Take a part in Raids</h3>
<div class="row">
<div class="raid-tabs">

<ul class="nav-tabs clearfix" role="tablist">
<li role="presentation" class="active wow bounceInRight">
<a href="#raid-karazhan" aria-controls="raid-karazhan" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-01.png" alt="">
<img src="/images/raid/raids-hov-01.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInDown">
<a href="#raid-zulaman" aria-controls="raid-zulaman" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-02.png" alt="">
<img src="/images/raid/raids-hov-02.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInLeft">
<a href="#raid-gruul" aria-controls="raid-gruul" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-03.png" alt="">
<img src="/images/raid/raids-hov-03.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInUp">
<a href="#raid-magtheridon" aria-controls="raid-magtheridon" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-04.png" alt="">
<img src="/images/raid/raids-hov-04.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceIn">
<a href="#raid-serpentshrine" aria-controls="raid-serpentshrine" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-05.png" alt="">
<img src="/images/raid/raids-hov-05.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInUp">
<a href="#raid-tempest-keep" aria-controls="raid-tempest-keep" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-06.png" alt="">
<img src="/images/raid/raids-hov-06.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInLeft">
<a href="#raid-mount-hyjal" aria-controls="raid-mount-hyjal" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-07.png" alt="">
<img src="/images/raid/raids-hov-07.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInDown">
<a href="#raid-black-temple" aria-controls="raid-black-temple" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-08.png" alt="">
<img src="/images/raid/raids-hov-08.png" class="hov" alt="">
</div>
</a>
</li>
<li role="presentation" class="wow bounceInRight">
<a href="#raid-sunwell" aria-controls="raid-sunwell" role="tab" data-toggle="tab">
<div class="img">
<img src="/images/raid/raids-09.png" alt="">
<img src="/images/raid/raids-hov-09.png" class="hov" alt="">
</div>
</a>
</li>
</ul>
</div>
</div>
<div class="row tabs-row">

<div class="tab-content">
<div role="tabpanel" class="tab-pane clearfix active" id="raid-karazhan">
<div class="place wow flip">
<h3 class="title">Karazhan</h3>
<img src="/images/raid/img-raid-karazhan.png" alt="">
<div class="text">Medivh, the Last Guardian, made his home in Deadwind Pass in the bright tower of Karazhan. Though he was the greatest wizard of his day (and humanity's intended custodian), Medivh was secretly possessed by the dark spirit of Sargeras, the Destroyer of Worlds. Through Medivh, Sargeras opened the Dark Portal and allowed the orcs to wage war upon the kingdoms of Azeroth.</div>
</div>
<div class="place-raids wow rotateIn">
<div class="col">
<img src="/images/raid/raid-attumen-the-hunsman.png" alt="">
<p>Attument the Hunsman</p>
</div>
<div class="col">
<img src="/images/raid/raid-moroes.png" alt="">
<p>Moroes</p>
</div>
<div class="col">
<img src="/images/raid/raid-maiden-of-virtue.png" alt="">
<p>Maiden of Virtue</p>
</div>
<div class="col">
<img src="/images/raid/raid-opera-hall.png" alt="">
<p>Opera Hall</p>
</div>
<div class="col">
<img src="/images/raid/raid-the-curator.png" alt="">
<p>The Curator</p>
</div>
<div class="col">
<img src="/images/raid/raid-chess-event.png" alt="">
<p>Chess Event</p>
</div>
<div class="col">
<img src="/images/raid/raid-terestian-illhoof.png" alt="">
<p>Terestian Illhoof</p>
</div>
<div class="col">
<img src="/images/raid/raid-shade-of-aran.png" alt="">
<p>Shade of Aran</p>
</div>
<div class="col">
<img src="/images/raid/raid-netherspite.png" alt="">
<p>Netherspite</p>
</div>
<div class="col">
<img src="/images/raid/raid-prince-malchezaar.png" alt="">
<p>Prince Malchezaar</p>
</div>
<div class="col">
<img src="/images/raid/raid-nightbane.png" alt="">
<p>Nightbane</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-zulaman">
<div class="place">
<h3 class="title">Zul’aman</h3>
<img src="/images/raid/img-raid-zulaman.png" alt="">
<div class="text">Following years of battles alongside the old Horde, the troll warlord Zul'jin retired to the city of Zul'Aman, capital of the Amani trolls. There he called upon mysterious dark powers to rebuild his army. While the eyes of Azeroth focused on the fight against the Burning Legion and the expedition to Outland, treasure-seekers invaded Zul'Aman, rekindling Zul'jin's hatred of the outside world - particularly the high elves of Quel'Thalas. </div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-nalorakk.png" alt="">
<p>Nalorakk</p>
</div>
<div class="col">
<img src="/images/raid/raid-akilzon.png" alt="">
<p>Akil’zon</p>
</div>
<div class="col">
<img src="/images/raid/raid-janalai.png" alt="">
<p>Jan’alai</p>
</div>
<div class="col">
<img src="/images/raid/raid-halazzi.png" alt="">
<p>Halazzi</p>
</div>
<div class="col">
<img src="/images/raid/raid-hex-lord-malacrass.png" alt="">
<p>Hex Lord Malacrass</p>
</div>
<div class="col">
<img src="/images/raid/raid-zuljin.png" alt="">
<p>Zul’jin</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-gruul">
<div class="place">
<h3 class="title">Gruul's Lair</h3>
<img src="/images/raid/img-raid-gruul.png" alt="">
<div class="text">When the infamous Dragon Aspect, Deathwing, discovered the Dark Portal and Draenor, he felt sure that few of Draenor's denizens would dare challenge the black dragonflight, so he scattered clutches of his eggs throughout the world.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-high-king-mauglar.png" alt="">
<p>High King Mauglar</p>
</div>
<div class="col">
<img src="/images/raid/raid-grull-the-dragonkiller.png" alt="">
<p>Grull The Dragonkiller</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-magtheridon">
<div class="place">
<h3 class="title">Magtheridon's Lair</h3>
<img src="/images/raid/img-raid-magtheridon.png" alt="">
<div class="text">After the Legion invaded, Magtheridon controlled all but small pockets of Outland. Despite this, he was taken largely by surprise when Illidan and his allies conquered the Black Temple. Many believed that Magtheridon had been slain in the attack, but when Illidan discovered that Magtheridon's blood had a transformative, corrupting effect on orcs, the beaten pit lord was dragged to Hellfire Citadel.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-magtheridon.png" alt="">
<p>Magtheridon</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-serpentshrine">
<div class="place">
<h3 class="title">Serpentshrine Cavern</h3>
<img src="/images/raid/img-raid-serpentshrine-cavern.png" alt="">
<div class="text">“Whoever controls the water, controls Outland.” <br> These are the words of Lord Illidan Stormrage to his most trusted lieutenant, Lady Vashj. Shortly after the Third War, when Illidan requested the aid of the naga, a group of naga led by Lady Vashj answered his call. Ever since, Vashj has displayed a fierce dedication to Illidan.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-hydros-the-unstable.png" alt="">
<p>Hydros the Unstable</p>
</div>
<div class="col">
<img src="/images/raid/raid-fathom-lord-karathress.png" alt="">
<p>Fathom - Lord Karathress</p>
</div>
<div class="col">
<img src="/images/raid/raid-the-lurker-below.png" alt="">
<p>The Lurker Below</p>
</div>
<div class="col">
<img src="/images/raid/raid-morogrim-tidewalker.png" alt="">
<p>Morogrim Tidewalker</p>
</div>
<div class="col">
<img src="/images/raid/raid-leotheras-the-blind.png" alt="">
<p>Leotheras the Blind</p>
</div>
<div class="col">
<img src="/images/raid/raid-lady-vashj.png" alt="">
<p>Lady Vashj</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-tempest-keep">
<div class="place">
<h3 class="title">Tempest Keep</h3>
<img src="/images/raid/img-raid-tempest-keep.png" alt="">
<div class="text">The mighty Tempest Keep was created by the enigmatic naaru: sentient beings of pure energy and the sworn enemies of the Burning Legion. In addition to serving as a base of operations for the naaru, the structure itself possesses the technology to teleport through alternate dimensions, traveling from one location to another in the blink of an eye.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-alar.png" alt="">
<p>Al’ar</p>
</div>
<div class="col">
<img src="/images/raid/raid-high-astromancer-solarian.png" alt="">
<p>High Astromancer Solarian</p>
</div>
<div class="col">
<img src="/images/raid/raid-void-reaver.png" alt="">
<p>Void Reaver</p>
</div>
<div class="col">
<img src="/images/raid/raid-kaelthas-sunstrider.png" alt="">
<p>Kael’thas Sunstrider</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-mount-hyjal">
<div class="place">
<h3 class="title">The Battle for Mount Hyjal</h3>
<img src="/images/raid/img-raid-the-battle-for-mount-hyjal.png" alt="">
<div class="text">Deep within the Caverns of Time, the brooding dragon Nozdormu has awakened. Since the world was young, the bronze dragonflight has safeguarded the winding labyrinth, monitoring the shifting timeways to ensure that the delicate balance of time is upheld.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-rage-winterchill.png" alt="">
<p>Rage Winterchill</p>
</div>
<div class="col">
<img src="/images/raid/raid-azgalor.png" alt="">
<p>Azgalor</p>
</div>
<div class="col">
<img src="/images/raid/raid-anetheron.png" alt="">
<p>Anetheron</p>
</div>
<div class="col">
<img src="/images/raid/raid-archimonde.png" alt="">
<p>Archimonde</p>
</div>
<div class="col">
<img src="/images/raid/raid-kazrogal.png" alt="">
<p>Kaz’rogal</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-black-temple">
<div class="place">
<h3 class="title">Black Temple</h3>
<img src="/images/raid/img-raid-black-temple.png" alt="">
<div class="text">Long ago on Draenor, the Temple of Karabor was the center of draenei worship. But the devout priests who prayed there are long dead, slaughtered by marauding, demonically corrupted orcs. In the massacre's aftermath, the warlocks of the Shadow Council seized the structure and bestowed upon it a new name: the Black Temple.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-high-warlord-najentus.png" alt="">
<p>High Warlord Naj’entus</p>
</div>
<div class="col">
<img src="/images/raid/raid-reliquary-of-souls.png" alt="">
<p>Reliquary of Souls</p>
</div>
<div class="col">
<img src="/images/raid/raid-supremus.png" alt="">
<p>Supremus</p>
</div>
<div class="col">
<img src="/images/raid/raid-mother-shahraz.png" alt="">
<p>Mother Shahraz</p>
</div>
<div class="col">
<img src="/images/raid/raid-shade-of-akama.png" alt="">
<p>Shade of Akama</p>
</div>
<div class="col">
<img src="/images/raid/raid-the-illidari-council.png" alt="">
<p>The Illidari Council</p>
</div>
<div class="col">
<img src="/images/raid/raid-teron-gorefiend.png" alt="">
<p>Teron Gorefiend</p>
</div>
<div class="col">
<img src="/images/raid/raid-illidan-stormrage.png" alt="">
<p>Illidan Stormrage</p>
</div>
<div class="col">
<img src="/images/raid/raid-gurtogg-bloodboil.png" alt="">
<p>Gurtogg Bloodboil</p>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane clearfix" id="raid-sunwell">
<div class="place">
<h3 class="title">The Sunwell</h3>
<img src="/images/raid/img-raid-the-sunwell.png" alt="">
<div class="text">For millennia, the mystical pool of energy known as the Sunwell fueled the potent magic of the exiled high elves. Now, the remnants of this ancient fountain have become the Burning Legion's latest target as the demons prepare to summon their commander, Kil'jaeden, with the Sunwell's energy.</div>
</div>
<div class="place-raids">
<div class="col">
<img src="/images/raid/raid-kalecgos.png" alt="">
<p>Kalecgos</p>
</div>
<div class="col">
<img src="/images/raid/raid-eredar-twins.png" alt="">
<p>Eredar Twins</p>
</div>
<div class="col">
<img src="/images/raid/raid-brutallus.png" alt="">
<p>Brutallus</p>
</div>
<div class="col">
<img src="/images/raid/raid-muru.png" alt="">
<p>Mu’ru</p>
</div>
<div class="col">
<img src="/images/raid/raid-felmyst.png" alt="">
<p>Felmyst</p>
 </div>
<div class="col">
<img src="/images/raid/raid-kiljaeden.png" alt="">
<p>Kil’jaeden</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main> 


<footer id="footer"> 
<section class="section betakey" id="betakey"> 
<div class="section-panel"> <div class="container">  
<div class="form-content registration-content"> 

<h4 class="section-title text-center">Log In to Your Account</h4> 
<div class="section-content wow lightSpeedIn animated" style="visibility: visible; animation-name: lightSpeedIn;"> 
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="login_form">
<div class="row">
<div class="form-group form-group-lg">
<label>Username:</label>
<div class="form-control">
<input type="text" name="login_username" id='customID1'>
</div>
</div>
<div class="form-group form-group-lg">
<label>Password:</label>
<div class="form-control">
<input type="password" name="login_password">
</div>
</div>
</div>
 <div class="row"> 

 <div class="form-group text-left">
 <input type="submit" name="login" value="Log in">
 <!--<button type="submit" class="btn btn-yellow">Log in</button> -->
 </div>
 </div>
 <div class="row text-center"> 
 <div class="form-link">
 
 <a href="" data-target="betakey-content" class="showFormContent">I want to Register a New Account</a>
 </div>
 </div>
 </form> 
 </div>
 </div>
 
 <div class="form-content betakey-content active"> 
 
 <h3 class="section-title text-center wow pulse" style="visibility: visible; animation-name: pulse;">Register an account</h3>
<article class="section-text text-center wow flipInY" style="visibility: visible; animation-name: flipInY;"> 
<p>The main task of the open beta testing is to identify as many bugs as possible, so that we can fix them before the release. In order to participate in the open beta testing, please register an account below. <br> We kindly request that you only sign up for the open beta testing if you intend to fully participate in bug testing.</p></article> 
 <h4 class="section-title text-center">I want to Register an account</h4> 
 <div class="section-content wow lightSpeedIn" style="visibility: visible; animation-name: lightSpeedIn;"> 
 <form action=""> 
<div class="row">
<div class="form-group">
<label>Your E-mail:</label>
<div class="form-control">
<input type="text" name="Account[email]">
</div>
</div>
<div class="form-group">
<label>Username:</label>
<div class="form-control">
<input type="text" name="Account[username]">
</div>
</div>
<div class="form-group">
<label>Password:</label>
<div class="form-control">
<input type="password" name="Account[password]">
</div>
</div>
<div class="form-group">
<label>Confirm Password:</label>
<div class="form-control">
<input type="password" name="Account[password2]">
</div>
</div>
</div>
 <div class="row">

 <div class="form-group text-left"> 
 <button type="submit" class="btn btn-yellow">Sign Up</button> 
 </div>
 </div>
 <div class="row text-center">
 <div class="form-link">
 <a href="" data-target="registration-content" class="showFormContent">I already have an Account</a>
 </div>
 </div>
 </form> 
 </div>
 </div>
 </div>
 </div>
 
 <div class="copyrights"> <div class="container"> <div class="go-forum text-center"><a href="" class="btn">Go to Forum</a></div><div class="row"> <div class="copy"> © 2019 Gaming portal <a href="">Nefelin-WoW.Com</a> </div><div class="u wow fadeInUp" style="visibility: hidden; animation-name: none;"> </div></div></div></div></section> </footer>


<script src="/css/js/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="/css/js/modernizr.custom.js" type="text/javascript"></script>
<script src="/css/js/jquery.easing.js" type="text/javascript"></script>
<script src="/css/js/jquery.fancybox.js" type="text/javascript"></script>
<script src="/css/js/jquery.fancybox-media.js" type="text/javascript"></script>
<script src="/css/js/wow.min.js" type="text/javascript"></script>
<script src="/css/js/tab.js" type="text/javascript"></script>
<script src="https://unsimpleworld.com/portfolio/html-preview/blackrock-landing-page-world-of-warcraft/js/custom.js" type="text/javascript"></script>

<?php } ?>


<?php if(isset($_SESSION['cw_user'])) { ?>
<meta http-equiv="refresh" content="0;url=?p=account">
<?php } ?>