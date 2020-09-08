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
<div>
Statistics </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="#">
Nefelin-WoW </a>
</div>
</div>
<h3 class="main-title">Game statistics</h3>
<div class="statistic">
<div class="row">
<div class="col">
<div class="item">
</div>
</div>
<div class="col">
<div class="item">
<img src="/themes/cp_nefelin/images/stat-type-02.jpg" alt="">
<div class="item-content">
<div>PvE statistics</div>
<a href="#" class="btn btn-low-green">View</a>
</div>
</div>
</div>
<div class="col">
<div class="item">
<img src="/themes/cp_nefelin/images/stat-type-03.jpg" alt="">
<div class="item-content">
<div>Top Kills</div>
<a href="?p=kills" class="btn btn-low-green">View</a>
</div>
</div>
</div>
<div class="col">
<div class="item">
<img src="/themes/cp_nefelin/images/stat-type-04.jpg" alt="">
<div class="item-content">
<div>Time played</div>
<a href="#" class="btn btn-low-green">View</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>

<?php include "footer.php" ?>