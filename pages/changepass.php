<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">

<div class='box_two_title'>Change Password</div>
<?php
account::isNotLoggedIn();
if (isset($_POST['change_pass']))
	account::changePass($_POST['cur_pass'],$_POST['new_pass'],$_POST['new_pass_repeat']);
?>
<form action="?p=changepass" method="post">
<table width="70%">
       <tr>
           <td>New password:</td> 
           <td><input type="password" name="new_pass" class="input_text"/></td>
       </tr> 
       <tr>
           <td>Repeat new password:</td> 
           <td><input type="password" name="new_pass_repeat" class="input_text"/></td>
       </tr>
        <tr>
           <td></td> 
           <td><hr/></td>
       </tr> 
       <tr>
           <td>Enter your current password:</td> 
           <td><input type="password" name="cur_pass" class="input_text"/></td>
       </tr>  
       <tr>
           <td></td> 
           <td><input type="submit" value="Change Password" name="change_pass" /></td>
       </tr>                
</table>                 
</form>

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