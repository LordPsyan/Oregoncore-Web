<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">
<?php account::isNotLoggedIn(); ?>
<div class='box_two_title'>Refer-A-Friend</div>
<b class='yellow_text'>Your referral link: </b> <div id="raf_box">
                  <?php echo $GLOBALS['website_domain']."?p=register&id=".account::getAccountID($_SESSION['cw_user']); ?>
</div><br/>
<h4 class='blue_text'>How does it work?</h4>

It's simple! Just copy the link above and send it to your friends. If they create an account using your referral link, you two can venture into Azeroth with faster leveling speeds, reputation gain, and more!
</div>  
<div id="footer">
{footer}
</div>

</div>

<div id="rightcontent">     
{login}          
{serverstatus}  			
</div>
</div>  