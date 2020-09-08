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
<a class="active" href="?p=shop">
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
<div>
Shop </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="#">
Nefelin-WoW </a>
</div>
</div>
<div class="shop-categories en">
<div class="row">
<div class="col">
<div class="item item-1">
<div class="row">Purchase items</div>
<a href="?p=voteshop" class="btn btn-low-yellow">Let's Go</a>
</div>
</div>
<div class="col" style="opacity:0.1">
<div class="item item-2">
<div class="row">Character auction</div>
<a href="#" class="btn btn-low-yellow">Let's Go</a>
</div>
</div>
<div class="col" style="opacity:0.1">
<div class="item item-6">
<div class="row">Gold Exchange</div>
<a href="#" class="btn btn-low-yellow">Let's Go</a>
</div>
</div>
<div class="col half">
<div class="item item-4">
<div class="row">Edit your character</div>
<a href="?p=work_list" class="btn btn-low-yellow">Let's Go</a>
</div>
</div>
<div class="col half" style="opacity:0.1">
<div class="item item-5">
<div class="row">Edit guild</div>
<a href="javascript:void(0)" class="btn btn-low-yellow">Let's Go</a>
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