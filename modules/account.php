
<?php if (!isset($_SESSION['cw_user'])) { 
 	  if (isset($_POST['login'])) 
	  	account::logIn($_POST['login_username'],$_POST['login_password'],$_SERVER['REQUEST_URI'],$_POST['login_remember']);
?>
     <div class="box_one">
	 <div class="box_one_title">Account Management</div> 
     <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
     <fieldset style="border: none; margin: 0; padding: 0;">
         <input type="text" placeholder="Username" name="login_username" class="login_input" /><br/>
         <input type="password" placeholder="Password..." name="login_password" class="login_input" style="margin-top: -1px;" /><br/>
         <input type="submit" value="Log In" name="login" style="margin-top: 4px;" /> 
         <input type="checkbox" name="login_remember" checked="checked"/> Remember me
     </fieldset>    
     </form> <br/>
     <table width="100%">
            <tr>
                <td><a href="?p=register">Create an account</a></td>
                <td align="right"><a href="?p=forgotpw">Forgot your Password?</a></td>
            </tr>
     </table>
     </div>
<?php } ?>


<?php if(isset($_SESSION['cw_user'])) { ?>
<div class="box_one">
<div class="box_one_title">Account Management</div>
<span style="z-index: 99;">Welcome back <?php echo $_SESSION['cw_user']; ?>
			<?php 
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['adminPanel_minlvl'] && $GLOBALS['adminPanel_enable']==true) 
				echo ' <a href="admin/">(Admin Panel)</a>';
				
			if (isset($_SESSION['cw_gmlevel']) && $_SESSION['cw_gmlevel']>=$GLOBALS['staffPanel_minlvl'] && $GLOBALS['staffPanel_enable']==true) 
				echo ' <a href="staff/">(Staff Panel)</a>';
			?>
            </span>
			<hr/>
            <input type='button' value='Account Panel' onclick='window.location="?p=account"' class="leftbtn">
			<input type='button' value='Change Password'  onclick='window.location="?p=changepass"' class="leftbtn">
            <input type='button' value='Vote Shop' onclick='window.location="?p=voteshop"' class="leftbtn">  
			<input type='button' value='Donation Shop'  onclick='window.location="?p=donateshop"' class="leftbtn">
            <input type='button' value='Refer-A-Friend'  onclick='window.location="?p=raf"' class="leftbtn">
            <input type='button' value='Log Out'  
            onclick='window.location="?p=logout&last_page=<?php echo $_SERVER["REQUEST_URI"]; ?>"' class="leftbtn">
</div>
			<?php } ?>
