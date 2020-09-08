<?php
##############
##  Account functions goes here
##############

class account {
	
	###############################
	####### Log in method
	###############################
	public static function logIn($username,$password,$last_page,$remember) 
	{
		if (!isset($username) || !isset($password) || $username=="Username..." || $password=="Password...") 
			echo '<span class="red_text">Please enter both fields.</span>'; 
		else 
		{
			$username = mysql_real_escape_string(trim(strtoupper($username)));
			$password = mysql_real_escape_string(trim(strtoupper($password)));
			
			connect::selectDB('logondb');
			$checkForAccount = mysql_query("SELECT COUNT(id) FROM account WHERE username='".$username."'");
			if (mysql_result($checkForAccount,0)==0) 
				echo '
			
			<div id="ajax_notification" class="notification_red" style="z-index: 999999; display: block;">Invalid username.</div>
			

			';	
			else 
			{
				if($remember!=835727313) 
					$password = sha1("".$username.":".$password.""); 
					
				$result = mysql_query("SELECT id FROM account WHERE username='".$username."' AND sha_pass_hash='".$password."'");
				if (mysql_num_rows($result)==0) 
					echo '
				<div id="ajax_notification" class="notification_red" style="z-index: 999999; display: block;">Wrong password.</div>

			';
				else 
				{
					if($remember=='on') 
						setcookie("cw_rememberMe", $username.' * '.$password, time()+30758400);
						//Set "remember me" cookie. Expires in 1 year.
						 
					$id = mysql_fetch_assoc($result); 
					$id = $id['id'];
					
					self::GMLogin($username);
					$_SESSION['cw_user']=ucfirst(strtolower($username));
					$_SESSION['cw_user_id']=$id;
					
					connect::selectDB('webdb');
					$count = mysql_query("SELECT COUNT FROM account_data WHERE id='".$id."'");
					if(mysql_result($count,0)==0)
						mysql_query("INSERT INTO account_data VALUES('".$id."','0','0','')");
					
					if(!empty($last_page))
					   header("Location: ".$last_page);
					else
					   header("Location: index.php"); 
				}
			}
			
		}
		
	}
	
	public static function loadUserData() 
	{
		//Unused function
		$user_info = array();
		
		connect::selectDB('logondb');
		$account_info = mysql_query("SELECT id, username, email, joindate, locked, last_ip, expansion FROM account 
		WHERE username='".$_SESSION['cw_user']."'");
		while($row = mysql_fetch_array($account_info)) 
		{
			$user_info[] = $row;
		}
		
	    return $user_info;
	}
	
	###############################
	####### Log out method
	###############################
	public static function logOut($last_page) 
	{
		session_destroy();
		setcookie('cw_rememberMe', '', time()-30758400);
		if (empty($last_page)) 
		{
			header('Location: ?p=home"');
			exit();
		}
		header('Location: '.$last_page);
	}
	
	
	###############################
	####### Registration method
	###############################
	public function register($username,$email,$password,$repeat_password,$captcha,$raf) 
	{
		$errors = array();
		
		if (empty($username))  
			$errors[] = 'Enter a username.';
			
		if (empty($email)) 
			$errors[] = 'Enter an email address.';
			
		if (empty($password)) 
			$errors[] = 'Enter a password.';
			
		if (empty($repeat_password)) 
			$errors[] = 'Enter the password repeat.';
			
		if($username==$password) 
			$errors[] = 'Your password cannot be your username!';
			
		else 
		{
			session_start();
			if($GLOBALS['registration']['captcha']==TRUE) 
			{ 
				if($captcha!=$_SESSION['captcha_numero']) 
					$errors[] = 'The captcha is incorrect!';
			}
			
			if (strlen($username)>$GLOBALS['registration']['userMaxLength'] || strlen($username)<$GLOBALS['registration']['userMinLength']) 
				$errors[] = 'The username must be between '.$GLOBALS['registration']['userMinLength'].' and '.$GLOBALS['registration']['userMaxLength'].' letters.';
				
			if (strlen($password)>$GLOBALS['registration']['passMaxLength'] || strlen($password)<$GLOBALS['registration']['passMinLength']) 
				$errors[] = 'The password must be between '.$GLOBALS['registration']['passMinLength'].' and '.$GLOBALS['registration']['passMaxLength'].' letters.';
				
			if ($GLOBALS['registration']['validateEmail']==true) 
			{
			    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
				       $errors[] = 'Enter a valid email address.';
			}
			
		}
		$username_clean = mysql_real_escape_string(trim($username));
		$password_clean = mysql_real_escape_string(trim($password));
		$username = mysql_real_escape_string(trim(strtoupper(strip_tags($username))));
		$email = mysql_real_escape_string(trim(strip_tags($email)));
		$password = mysql_real_escape_string(trim(strtoupper(strip_tags($password))));
		$repeat_password = trim(strtoupper($repeat_password));
		$raf = (int)$raf;
		
		
		connect::selectDB('logondb');
		//Check for existing user
		$result = mysql_query("SELECT COUNT(id) FROM account WHERE username='".$username."'");
		if (mysql_result($result,0)>0) 
			$errors[] = 'The username already exists!';
		
		if ($password != $repeat_password) 
			$errors[] = 'The passwords does not match!';
		
		if (!empty($errors)) 
		{
			//errors found.
			echo "<div class='news' style='padding: 5px;'><h4>The following errors occured:</h4>";
			foreach($errors as $error) 
			{
				echo  "<strong>*", $error ,"</strong><br/>";
			}
			echo "</div>";
			exit();
		} 
		else 
		{
			$password = sha1("".$username.":".$password."");
			mysql_query("INSERT INTO account (username,email,sha_pass_hash,joindate,expansion,recruiter) 
			VALUES('".$username."','".$email."','".$password."','".date("Y-m-d H:i:s")."','".$GLOBALS['core_expansion']."','".$raf."') "); 
			
			$getID = mysql_query("SELECT id FROM account WHERE username='".$username."'");
			$row = mysql_fetch_assoc($getID);
			connect::selectDB('webdb');
			mysql_query("INSERT INTO account_data VALUES('".$row['id']."','','','')"); 
			
			$result = mysql_query("SELECT id FROM account WHERE username='".$username_clean."'");
						 
			$id = mysql_fetch_assoc($result); 
			$id = $id['id'];
					
			account::GMLogin($username_clean);
			$_SESSION['cw_user']=ucfirst(strtolower($username_clean));
			$_SESSION['cw_user_id']=$id;
			
			account::forumRegister($username_clean,$password_clean,$email);
		}

	}
	
	
	public static function forumRegister($username,$password,$email) 
	{
	 date_default_timezone_set($GLOBALS['timezone']);
	 
     global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
	 if($GLOBALS['forum']['type']=='phpbb' && $GLOBALS['forum']['autoAccountCreate']==TRUE) 
	 {
		     ////////PHPBB INTEGRATION//////////////
			ini_set('display_errors',1);
			define('IN_PHPBB', true);
			define('ROOT_PATH', '../..'.$GLOBALS['forum']['forum_path']);

			$phpEx = "php";
			$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : ROOT_PATH;
			
			if(file_exists($phpbb_root_path . 'common.' . $phpEx) && file_exists($phpbb_root_path . 'includes/functions_user.' . $phpEx)) 
			{
			include($phpbb_root_path . 'common.' . $phpEx);
			
			include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
			
			$arrTime = getdate();
			$unixTime = strtotime($arrTime['year'] . "-" . $arrTime['mon'] . '-' . $arrTime['mday'] . " " . $arrTime['hours'] . ":" . $arrTime['minutes'] . ":" . $arrTime['seconds']);

			$user_row = array(
			'username'              => $username,
			'user_password'         => phpbb_hash($password),
			'user_email'            => $email,
			'group_id'              => (int) 2,
			'user_timezone'         => (float) 0,
			'user_dst'              => "0",
			'user_lang'             => "en",
			'user_type'             => 0,
			'user_actkey'           => "",
			'user_ip'               => $_SERVER['REMOTE_HOST'],
			'user_regdate'          => $unixTime,
			'user_inactive_reason'  => 0,
			'user_inactive_time'    => 0
			);

			// All the information has been compiled, add the user
			// tables affected: users table, profile_fields_data table, groups table, and config table.
			$user_id = user_add($user_row);
			}
	  	}
	}
	
	###############################
	####### Check if a user is logged in method.
	###############################
	public static function isLoggedIn() 
	{
		if (isset($_SESSION['cw_user'])) 
			header("Location: ?p=account");
	}
	
	
	
	###############################
	####### Check if a user is NOT logged in method.
	###############################
	public static function isNotLoggedIn() 
	{
		if (!isset($_SESSION['cw_user'])) 
			header("Location: ?p=login&r=".$_SERVER['REQUEST_URI']);
	}
	
	public static function isNotGmLoggedIn() 
	{
		if (!isset($_SESSION['cw_gmlevel']))
			header("Location: ?p=home");
	}
	
	
	###############################
	####### Return ban status method.
	###############################
	public static function checkBanStatus($user) 
	{
		connect::selectDB('logondb');
		$acct_id = self::getAccountID($user);
		
		$result = mysql_query("SELECT bandate,unbandate,banreason FROM account_banned WHERE id='".$acct_id."' AND active=1");
		if (mysql_num_rows($result)>0) 
		{
			$row = mysql_fetch_assoc($result);
			if($row['bandate'] > $row['unbandate']) 
				$duration = 'Infinite';
			else 
			{
				$duration = $row['unbandate'] - $row['bandate'];
				$duration = ($duration / 60)/60;
				$duration = $duration.' hours';  
			}
				echo '<span class="yellow_text">Banned<br/>
				Reason: '.$row['banreason'].'<br/>
				Time left: '.$duration.'</span>';
		} 
		else 
			echo '<b class="green_text">Active</b>';
	}
	
	
	###############################
	####### Return account ID method.
	###############################
	public static function getAccountID($user) 
	{
		$user = mysql_real_escape_string($user);
		connect::selectDB('logondb');
		$result = mysql_query("SELECT id FROM account WHERE username='".$user."'");
		$row = mysql_fetch_assoc($result);
		return $row['id'];
	}
	
	public static function getAccountName($id) 
	{
		$id = (int)$id;
		connect::selectDB('logondb');
		$result = mysql_query("SELECT username FROM account WHERE id='".$id."'");
		$row = mysql_fetch_assoc($result);
		return $row['username'];
	}
	
	
	###############################
	####### "Remember me" method. Loads on page startup.
	###############################
	public function getRemember() 
	{
		if (isset($_COOKIE['cw_rememberMe']) && !isset($_SESSION['cw_user'])) {
			$account_data = explode("*", $_COOKIE['cw_rememberMe']);
			$this->logIn($account_data[0],$account_data[1],$_SERVER['REQUEST_URI'],835727313);
		}	
	}
	
	
	###############################
	####### Return account Vote Points method.
	###############################
	public static function loadVP($account_name) 
	{
		$acct_id = self::getAccountID($account_name);
		connect::selectDB('webdb');
		$result = mysql_query("SELECT vp FROM account_data WHERE id=".$acct_id);
		if (mysql_num_rows($result)==0) 
			return 0;
		else 
		{
			$row = mysql_fetch_assoc($result);
			return $row['vp'];
		}
	}
	
	
	public static function loadDP($account_name) 
	{
	    $acct_id = self::getAccountID($account_name);
		connect::selectDB('webdb');
		$result = mysql_query("SELECT dp FROM account_data WHERE id=".$acct_id);
		if (mysql_num_rows($result)==0) 
			return 0;
		else 
		{
			$row = mysql_fetch_assoc($result);
			return $row['dp'];
		}
	}
	
	
	
	###############################
	####### Return email method.
	###############################
	public static function getEmail($account_name) 
	{
		$account_name = mysql_real_escape_string($account_name);
		connect::selectDB('logondb');
		$result = mysql_query("SELECT email FROM account WHERE username='".$account_name."'");
		$row = mysql_fetch_assoc($result);
		return $row['email'];
	}
	
	
	###############################
	####### Return online status method.
	###############################
	public static function getOnlineStatus($account_name) 
	{
		$account_name = mysql_real_escape_string($account_name);
		connect::selectDB('logondb');
		$result = mysql_query("SELECT COUNT(online) FROM account WHERE username='".$account_name."' AND online=1");
		if (mysql_result($result,0)==0) 
			return '<b class="red_text">Offline</b>';
		else
			return '<b class="green_text">Online</b>';
	}
	
	
	###############################
	####### Return Join date method.
	###############################
	public static function getJoindate($account_name) 
	{
		$account_name = mysql_real_escape_string($account_name);
		connect::selectDB('logondb');
		$result = mysql_query("SELECT joindate FROM account WHERE username='".$account_name."'");
		$row = mysql_fetch_assoc($result);
		return $row['joindate'];
	}
	
	
	###############################
	####### Returns a GM session if the user is a GM with rank 2 and above.
	###############################
	public static function GMLogin($account_name) 
	{
		connect::selectDB('logondb');
		$acct_id = self::getAccountID($account_name);
		
		$result = mysql_query("SELECT gmlevel FROM account_access WHERE gmlevel > 2 AND id=".$acct_id);
		if(mysql_num_rows($result)>0) 
		{
			$row = mysql_fetch_assoc($result);
			$_SESSION['cw_gmlevel']=$row['gmlevel'];
		}
		
	}
	
	public static function getCharactersForShop($account_name) 
	{
		$acct_id = self::getAccountID($account_name);
		connect::selectDB('webdb');
		$getRealms = mysql_query("SELECT id,name FROM realms");
		while($row = mysql_fetch_assoc($getRealms)) 
		{
			connect::connectToRealmDB($row['id']);
			$result = mysql_query("SELECT name,guid FROM characters WHERE account='".$acct_id."'");
			if(mysql_num_rows($result)==0 && !isset($x))
			{
				$x = true;
			     echo '<option value="">No characters found!</option>';
			}
				  
			while($char = mysql_fetch_assoc($result)) 
			{
				echo '<option value="'.$char['guid'].'*'.$row['id'].'">'.$char['name'].' - '.$row['name'].'</option>';
			}
		}
	}
	
	
	public static function changeEmail($email,$current_pass) 
	{

		$errors = array();
		if (empty($current_pass)) 
			$errors[] = 'Please enter your current password'; 
		else 
		{
			if (empty($email)) 
				$errors[] = 'Please enter an email address.';
			
			connect::selectDB('logondb');
			$username = mysql_real_escape_string(trim(strtoupper($_SESSION['cw_user'])));
			$password = mysql_real_escape_string(trim(strtoupper($current_pass)));
			
			$password = sha1("".$username.":".$password."");

			$result = mysql_query("SELECT COUNT(id) FROM account WHERE username='".$username."' AND sha_pass_hash='".$password."'");
			if (mysql_result($result,0)==0) 
				$errors[] = 'The current password is incorrect.';
			
			
			if ($GLOBALS['registration']['validateEmail']==true) 
			{
			    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
				    $errors[] = 'Enter a valid email address.';
				 else 
					 mysql_query("UPDATE account SET email='".$email."' WHERE username='".$_SESSION['cw_user']."'");
			}
			
		}
		if(empty($errors)) 
			echo 'Successfully updated your account.';
		else 
		{
			echo '<div class="news" style="padding: 5px;">
			<h4 class="red_text">The following errors occured:</h4>';
				   foreach($errors as $error) 
				   {
					 echo  '<strong class="yellow_text">*', $error ,'</strong><br/>';
				   }
			echo '</div>';
		}
	}
	
	
	
	//Used for the change password page.
	public static function changePass($old,$new,$new_repeat) 
	{
		$_POST['cur_pass']=mysql_real_escape_string(trim($old));
		$_POST['new_pass']=mysql_real_escape_string(trim($new));
		$_POST['new_pass_repeat']=mysql_real_escape_string(trim($new_repeat));
		
		//Check if all field values has been typed into
		if (!isset($_POST['cur_pass']) || !isset($_POST['new_pass']) || !isset($_POST['new_pass_repeat'])) 
			echo '<b class="red_text">Please type in all fields!</b>';
	    else 
		{
			//Check if new passwords match?
			if ($_POST['new_pass'] != $_POST['new_pass_repeat'])
				echo '<b class="red_text">The new passwords doesnt match!</b>';
			else 
			{
			  if (strlen($_POST['new_pass']) < $GLOBALS['registration']['passMinLength'] || 
			      strlen($_POST['new_pass'] > $GLOBALS['registration']['passMaxLength'])) 
				  echo '<b class="red_text">Your password must be between 6 and 32 letters</b>';
			  else 
			  {
				//Lets check if the old password is correct!
				$username = strtoupper(mysql_real_escape_string($_SESSION['cw_user']));
				connect::selectDB('logondb');
				$getPass = mysql_query("SELECT `sha_pass_hash` FROM `account` WHERE `username`='".$username."'");
				$row = mysql_fetch_assoc($getPass);
				$thePass = $row['sha_pass_hash'];
				
				$pass = mysql_real_escape_string(strtoupper($_POST['cur_pass']));
				$pass_hash = SHA1($username.':'.$pass);
				
				$new_pass = mysql_real_escape_string(strtoupper($_POST['new_pass']));
				$new_pass_hash = SHA1($username.':'.$new_pass);
				
				if ($thePass != $pass_hash) 
					echo '<b class="red_text">The old password is not correct!</b>';
				else 
				{
					//success, change password
					echo 'Your Password was changed!';
					mysql_query("UPDATE `account` SET `sha_pass_hash`='$new_pass_hash' WHERE `username`='".$username."'");
					mysql_query("UPDATE `account` SET `v`='0' AND `s`='0' WHERE username='".$username."'");
				}
			}
		  }
		}
	}
	
	public static function changePassword($account_name,$password) 
	{
			$username = mysql_real_escape_string(strtoupper($account_name));
			$pass = mysql_real_escape_string(strtoupper($password));
			$pass_hash = SHA1($username.':'.$pass);
			
			connect::selectDB('logondb');
			mysql_query("UPDATE `account` SET `sha_pass_hash`='$pass_hash' WHERE `username`='".$username."'");
			mysql_query("UPDATE `account` SET `v`='0' AND `s`='0' WHERE username='".$username."'");
			
			account::logThis("Changed password","passwordchange",NULL);
	}
	
	public static function forgotPW($account_name, $account_email) 
	{
		$account_name = mysql_real_escape_string($account_name);
		$account_email = mysql_real_escape_string($account_email);
		
		if (empty($account_name) || empty($account_email)) 
			echo '<b class="red_text">Please enter both fields.</b>';
		else 
		{
			connect::selectDB('logondb');
			$result = mysql_query("SELECT COUNT('id') FROM account 
								 WHERE username='".$account_name."' AND email='".$account_email."'");
			
			if (mysql_result($result,0)==0) 
				echo '<b class="red_text">The username or email is incorrect.</b>';
			else 
			{
				//Success, lets send an email & add the forgotpw thingy.
				$code = RandomString();
				website::sendEmail($account_email,$GLOBALS['default_email'],'Forgot Password',"
				Hello there. <br/><br/>
				A password reset has been requested for the account ".$account_name." <br/>
				If you wish to reset your password, click the following link: <br/>
				<a href='".$GLOBALS['website_domain']."?p=forgotpw&code=".$code."&account=".account::getAccountID($account_name)."'>
				".$GLOBALS['website_domain']."?p=forgotpw&code=".$code."&account=".account::getAccountID($account_name)."</a>
				
				<br/><br/>
				
				If you did not request this, just ignore this message.<br/><br/>
				Sincerely, The Management.
				");
				$account_id = self::getAccountID($account_name);
				connect::selectDB('webdb');
				
				mysql_query("DELETE FROM password_reset WHERE account_id='".$account_id."'");
				mysql_query("INSERT INTO password_reset VALUES ('','".$code."','".$account_id."')");
				echo "
				An email containing a link to reset your password has been sent to the Email address you specified. 
				If you've tried to send other password reset before this, they won't work. <br/>";
				}	
			}	
		}
	
		public static function hasVP($account_name,$points) 
		{
			$points = (int)$points;
			$account_id = self::getAccountID($account_name);
			connect::selectDB('webdb');
			$result = mysql_query("SELECT COUNT('id') FROM account_data WHERE vp >= '".$points."' 
			AND id='".$account_id."'");
			
			if (mysql_result($result,0)==0) 
				return FALSE;
			else
				return TRUE;
		}
		
		public static function hasDP($account_name,$points) 
		{
			$points = (int)$points;
			$account_id = self::getAccountID($account_name);
			connect::selectDB('webdb');
			$result = mysql_query("SELECT COUNT('id') FROM account_data WHERE dp >= '".$points."' 
			AND id='".$account_id."'");
			
			if (mysql_result($result,0)==0)
				return FALSE;
			else
				return TRUE;
		}
		
		
		public static function deductVP($account_id,$points) 
		{
			$points = (int)$points;
			$account_id = (int)$account_id;
			connect::selectDB('webdb');
            
			mysql_query("UPDATE account_data SET vp=vp - ".$points." WHERE id='".$account_id."'");
		}
		
		public static function deductDP($account_id,$points) 
		{
			$points = (int)$points;
			$account_id = (int)$account_id;
			connect::selectDB('webdb');
            
			mysql_query("UPDATE account_data SET dp=dp - ".$points." WHERE id='".$account_id."'");
		}
		
		public static function addDP($account_id,$points)
		{
			$account_id = (int)$account_id;
			$points = (int)$points;
			connect::selectDB('webdb');
			
			mysql_query("UPDATE account_data SET dp=dp + ".$points." WHERE id='".$account_id."'");
		}
		
		public static function addVP($account_id,$points)
		{
			$account_id = (int)$account_id;
			$points = (int)$points;
			connect::selectDB('webdb');
			
			mysql_query("UPDATE account_data SET dp=dp + ".$points." WHERE id='".$account_id."'");
		}
		
		public static function getAccountIDFromCharId($char_id,$realm_id) 
		{
			$char_id = (int)$char_id;
			$realm_id = (int)$realm_id;
			connect::selectDB('webdb');
			connect::connectToRealmDB($realm_id);
			
			$result = mysql_query("SELECT account FROM characters WHERE guid='".$char_id."'");
			$row = mysql_fetch_assoc($result);
			return $row['account'];
		}
		
		
		public static function isGM($account_name) 
		{
	         $account_id = self::getAccountID($account_name);
			 $result = mysql_query("SELECT COUNT(id) FROM account_access WHERE id='".$account_id."' AND gmlevel >= 1");
			 if (mysql_result($result,0)>0)
				 return TRUE;
			 else
				 return FALSE;
		}
		
		public static function logThis($desc,$service,$realmid)
		{
			$desc = mysql_real_escape_string($desc);
			$realmid = (int)$realmid;
			$service = mysql_real_escape_string($service);
			$account = (int)$_SESSION['cw_user_id'];
			
			connect::selectDB('webdb');
			mysql_query("INSERT INTO user_log VALUES('','".$account."','".$service."','".time()."','".$_SERVER['REMOTE_ADDR']."','".$realmid."','".$desc."')");
	}
}
?>