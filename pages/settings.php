<?php include "headers.php" ?>
<div class="container">
<div class="row">
<ul class="navbar-cp">
<li>
<a class="active" href="?p=ucp">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-01.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-01.png" alt="" /> </div>
<p>Account</p>
</a>
</li>
<li>
<a href="https://cp.elysium-project.org/shop">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-02.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-02.png" alt="" /> </div>
<p>Shop</p>
</a>
</li>
<li>
<a href="?p=donate">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-03.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-03.png" alt="" /> </div>
<p>Buy coins</p>
</a>
</li>
<li>
<a href="https://cp.elysium-project.org/main/characters">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-04.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-04.png" alt="" /> </div>
<p>Characters</p>
</a>
</li>
<li>
<a href="https://cp.elysium-project.org/armory">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-05.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-05.png" alt="" /> </div>
<p>Find character</p>
</a>
</li>
<li>
<a href="https://cp.elysium-project.org/stat">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-06.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-06.png" alt="" /> </div>
<p>Statistics</p>
</a>
</li>
<li>
<a href="?p=vote">
<div class="nav-img">
<img src="https://elysium-project.org/themes/cp_ely/images/cp-nav-07.png" alt="" /> <img class="hov" src="https://elysium-project.org/themes/cp_ely/images/cp-nav-hov-07.png" alt="" /> </div>
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
Change E-mail </div>
</div>
<div class="realm_picker">
<div class="">
Actual realm: </div>
<a href="https://elysium-project.org/main/realm">
Nefelin </a>
</div>
</div>
<?php account::isNotLoggedIn(); 
if (isset($_POST['save'])) {
	account::changeEmail($_POST['email'],$_POST['current_pass']);
}
?><br /><br /><br />
<div class="content-box main">
<div class="content-holder">
<div class="content-frame">
<div class="content">
<h2>Change E-mail address</h2>
<form action="?p=settings" method="post">
<div class="row">
<label for="PasswordForm_password">E-mail address</label>:<br />
<input class="default" name="email" type="text" value="<?php echo account::getEmail($_SESSION['cw_user']); ?>" /> </div>
<div class="row">
<label for="PasswordForm_password">Current password</label>:<br />
<input class="default" type="password" name="current_pass"/> </div>
</div>
</div>

<div class="row">
<input class="btn btn-yellow" type="submit" name="save" value="Save" /> </div>
</form> 
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