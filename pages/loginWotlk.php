<?php if (!isset($_SESSION['cw_user'])) { 
 	  if (isset($_POST['login'])) 
	  	account::logIn($_POST['login_username'],$_POST['login_password'],$_SERVER['REQUEST_URI'],$_POST['login_remember']);
?>

<?php include "header.php" ?>

<div class="container">
<div class="row">
<div class="user-panel not-logged">
<button data-target="login-content" class="btn btn-yellow scrollToForm wow rotateInUpLeft">Control Panel</button>
&nbsp; or &nbsp;
<button data-target="registration-content" class="btn btn-green scrollToForm wow rotateInUpRight">Create account</button>
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
<article class="news2 wow bounceInUp " style="background-image: url(/images/news/182-334-392.jpg)">
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
<a href="#">All news</a></div>
</div>
</section>
</div>
</div>
</main>

<?php 
account::isLoggedIn();
if ($_POST['register']) {
	account::register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['password_repeat'],$_POST['referer'],$_POST['captcha']);
} 
?>

<section class="section-panel">
<div class="container">
<div class="form-content registration-content active">
<h3 class="title">Register an Account</h3>
<div class="section-content">


<input type="hidden" value="<?php echo $_GET['id']; ?>" id="referer" />
<span id="username_check" style="display:none;"></span>

<div class="errors"></div>
<div class="row">
<div class="form-group">
<label>Your E-mail:</label>
<div class="form-control">
<input id="email" type="text" class="inputbox" alt="email" size="38" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" value="<?php echo $_POST['email']; ?>">
</div>
</div>
<div class="form-group">
<label>Username:</label>
<div class="form-control">
<input id="username" type="text" class="inputbox" alt="username" size="38" maxlength="16" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Account'" value="<?php echo $_POST['username']; ?>" onkeyup="checkUsername()"/>
</div>
</div>
<div class="form-group">
<label>Password:</label>
<div class="form-control">
<input id="password" type="password" class="inputbox" alt="password" size="38" maxlength="16" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
</div>
</div>
<div class="form-group">
<label>Confirm Password:</label>
<div class="form-control">
<input id="password_repeat" type="password" class="inputbox" alt="Repeat the password" size="38" maxlength="16" placeholder="Repeat the Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repeat Password'">
</div>
</div>
</div>
<div class="row">
<div class="form-group text-right captcha">
<div id="greCaptcha"></div> </div>
<div class="form-group text-right">

<input type="submit" class="btn btn-green" value="Sign Up" onclick="register(<?php if($GLOBALS['registration']['captcha']==TRUE)  echo 1;  else  echo 0; ?>)" id="register"/>


</div>
</div>
<div class="row text-center">
<div class="form-link">
<a href="" data-target="login-content" class="showFormContent">I already have an Account</a>
</div>
</div>
</form>
</div>
</div>
<div class="form-content login-content">
<h3 class="title">Log In to Your Account</h3>
<div class="section-content">
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="login_form">
<div class="errors"></div>
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
<div class="form-group text-right captcha"></div>
<div class="form-group text-right">
<button type="submit" class="btn btn-green" name="login" id='customID2'>Log in</button>
</div>
</div>
<div class="row">
<div class="pull-left form-link" style="background-color: transparent; text-align: left; padding: 16px 9px 20px;">
<a href="" data-target="registration-content" class="showFormContent">
I want to Register a New Account </a>
</div>
<div class="pull-right form-link " style="background-color: transparent; text-align: right; padding: 16px 9px 20px;">
<a href="#">
Password recovery </a>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<footer id="footer">
<div class="container">
<div class="row clearfix">
<div id="footer-copy" class="wow fadeInUp">
&copy; 2018 - 2019 <a href="https://elysium-project.org/main/index">Nefelin-WoW Project, Wotlk Server</a>
</div>
</div>
</div>
</footer>
<script type="text/javascript" src="/themes/nefelin/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/themes/nefelin/js/custom.js"></script>



<script>
    var input = document.getElementById('customID1');
    var submit = document.getElementById('customID2');
    
    submit.addEventListener('click', function(event){
        input.value = input.value.replace(/ /g,'');
        console.log(input.value);
    });
</script>
</body>
</html>

<?php } ?>

<?php if(isset($_SESSION['cw_user'])) { ?>
<meta http-equiv="refresh" content="0;url=?p=account">
<?php } ?>