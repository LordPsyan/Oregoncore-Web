<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">

<div class='box_two_title'>Forgot Password</div>
<?php 
account::isLoggedIn();
if (isset($_POST['forgotpw'])) 
	account::forgotPW($_POST['forgot_username'],$_POST['forgot_email']);

if(isset($_GET['code']) || isset($_GET['account'])) {
 if (!isset($_GET['code']) || !isset($_GET['account']))
	 echo "<b class='red_text'>Link error, one or more required values are missing.</b>";
 else 
 {
	 connect::selectDB('webdb');
	 $code = mysql_real_escape_string($_GET['code']); $account = mysql_real_escape_string($_GET['account']);
	 $result = mysql_query("SELECT COUNT('id') FROM password_reset WHERE code='".$code."' AND account_id='".$account."'");
	 if (mysql_result($result,0)==0)
		 echo "<b class='red_text'>The values specified does not match the ones in the database.</b>";
	 else 
	 {
		 $newPass = RandomString();
		 echo "<b class='yellow_text'>Your new password is: ".$newPass." <br/><br/>Please sign in and change your password.</b>";
		 mysql_query("DELETE FROM password_reset WHERE account_id = '".$account."'");
		 $account_name = account::getAccountName($account);
		 
		 account::changePassword($account_name,$newPass);
		 
		 $ignoreForgotForm = true;
	 }
 }
}
if (!isset($ignoreForgotForm)) { ?> 
To reset your password, please type your username & the Email address you registered with. An email will be sent to you, containing a link to reset your password. <br/><br/>

<form action="?p=forgotpw" method="post">
<table width="80%">
    <tr>
         <td align="right">Username:</td> 
         <td><input type="text" name="forgot_username" /></td>
    </tr>
    <tr>
         <td align="right">Email:</td> 
         <td><input type="text" name="forgot_email" /></td>
    </tr>
    <tr>
         <td></td>
         <td><hr/></td>
    </tr>
    <tr>
         <td></td>
         <td><input type="submit" value="OK!" name="forgotpw" /></td>
    </tr>
</table>
</form> 
<?php } ?>
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