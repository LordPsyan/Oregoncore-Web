<?php
 	$server->selectDB('webdb'); 
 	$page = new page;
	
	$page->validatePageAccess('Realms');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
?>
<div class='box_right_title'>New Realm</div>
<?php if(isset($_POST['add_realm'])) {
	$server->addRealm($_POST['realm_id'],$_POST['realm_name'],$_POST['realm_desc'],$_POST['realm_host'],$_POST['realm_port']
			,$_POST['realm_chardb'],$_POST['realm_sendtype'],$_POST['realm_rank_username'],
			$_POST['realm_rank_password'],$_POST['realm_ra_port'],$_POST['realm_soap_port'],$_POST['realm_a_host']
			,$_POST['realm_a_user'],$_POST['realm_a_pass']);	
}?>

                        <form action="?p=realms" method="post" style="line-height: 15px;">
                        <b>General Realm Information</b><hr/>
                        Realm ID: <br/>
                        <input type="text" name="realm_id" placeholder="Default: 1"/> <br/>
                        <i class='blue_text'>This must be the same ID of the one you have specified in your realmlist table in Auth. 
                        					 Otherwise the uptime won't work properly if you have more than 1 realm.</i><br/>
                        Realm Name: <br/>
                        <input type="text" name="realm_name" placeholder="Default: Sample Realm"/> <br/>
                        (Optional) Realm Description: <br/>
                        <input type="text" name="realm_desc" placeholder="Default: Blizzlike 3x"/> <br/>
                        Realm Port: <br/>
                        <input type="text" name="realm_port" placeholder="Default: 8085"/> <br/>
                        Host: (IP or DNS) <br/>
                        <input type="text" name="realm_host" placeholder="Default: 127.0.0.1"/> <br/>
                        
                        <br/>
                        <b>Remote Console information</b> <i>(Vote- & Donation shop)</i><hr/>
                        Remote console <i>(You can always change this later)</i>: <br/>
                        <select name="realm_sendtype">
                                 <option value="ra">RA</option>
                                 <option value="soap">SOAP</option>
                        </select><br/>
                        <i class='blue_text'>Specify a level 3 GM account(Used for the remote console)<br/>
                        Tip: Do not use your admin account. Use a level 3 account.</i><br/>
                        Username: <br/>
                        <input type="text" name="realm_rank_username" placeholder="Default: rauser"/> <br/>
                        Password: <br/>
                        <input type="password" name="realm_rank_password" placeholder="Default: rapassword"/> <br/>
                        RA port: <i>(Can be ignored if you have chosen SOAP)</i> <br/>
                        <input type="text" name="realm_ra_port" placeholder="Default: 3443"/> <br/>
                        SOAP port: <i>(Can be ignored if you have chosen RA)</i> <br/>
                        <input type="text" name="realm_soap_port" placeholder="Default: 7878"/> <br/>
                        <br/>
                        <b>MySQL information</b> <i>(If left blank, settings will be copied from your configuration file)</i><hr/>
                        MySQL Host: <br/>
                        <input type="text" name="realm_m_host" placeholder="Default: 127.0.0.1"/><br/>
                        MySQL User: <br/>
                        <input type="text" name="realm_m_user" placeholder="Default: root"/><br/>
                        MySQL Password: <br/>
                        <input type="text" name="realm_m_pass" placeholder="Default: ascent"/><br/>
                        Character Database: <br/>
                        <input type="text" name="realm_chardb" placeholder="Default: characters"/> <br/>
                        <hr/>
                        <input type="submit" value="Add" name="add_realm" />                     
                        </form>
<?php } ?>
