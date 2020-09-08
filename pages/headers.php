<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/themes/cp_nefelin/css/animate.css" /> 
<link rel="stylesheet" type="text/css" href="/themes/cp_nefelin/css/style.css" /> 
<link rel="stylesheet" type="text/css" href="/themes/cp_nefelin/css/armory.css" /> 
<link rel="stylesheet" href="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/main.js"></script>
</head>
<body class="home">
<div class="wrapper">
<header id="header">
<div class="container">
<nav class="navbar clearfix" role="navigation">
<div class="languages wow lightSpeedIn">
<div class="caret"></div>
<a class="en active" href="/en"></a><a class="ru" href="/ru"></a>
</div>
<ul class="nav navbar-nav clearfix wow flip" style="display:inline !important;">
<li style="display:inline"><a href="./">Site</a></li>
<li><a href="#" target="_blank">Forum</a></li>
</ul>
<div class="brand">
<a class="logo" href="./">
<img class="logo-desktop wow swing" role="banner" src="/themes/cp_nefelin/images/logo.png" alt="logo" /> <img class="logo-mobile" role="banner" src="/themes/cp_nefelin/images/logo-small.png" alt="logo" /> </a>
</div>
<ul class="nav navbar-user clearfix wow flip">
<li class="">
<p class="username"><?php echo ucfirst(strtolower($_SESSION['cw_user']));?></p>
<a href="#" class="balance">
<span class="coin-gold"><!--<?php echo account::loadDP($_SESSION['cw_user']); ?>--></span>
<span class="count-gold"><?php echo account::loadVP($_SESSION['cw_user']); ?></span>
</a>
</li>
<?php if(isset($_SESSION['cw_user'])) { ?>
<li class="last"><a href='?p=logout&last_page=<?php echo $_SERVER["REQUEST_URI"]; ?>'><span class="ico-exit"></span></a></li>
<?php } ?>
</ul>
</nav>
</div>