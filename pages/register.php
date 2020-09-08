<?php 
account::isLoggedIn();
if ($_POST['register']) {
	account::register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['password_repeat'],$_POST['referer'],$_POST['captcha']);
} 
?>

<link rel="stylesheet" href="styles/default/main.css" />
<link rel="stylesheet" href="styles/default/login.css" />

<script src="styles/default/js/jquery.min.js"></script>
<script src="styles/default/js/skel.min.js"></script>
<script src="styles/default/js/main2.js"></script>

<style>
/* Form */

    label {
        display: block;
        font-weight: 400;
        color: #483949;
        margin: 0 0 1em 0;
    }

     input[type="text"],
     input[type="email"],
     input[type="password"],
     select,
     textarea {
        -webkit-appearance: none;
        display: block;
        border: 0;
        background: #fafafa;
        width: 100%;
        border-radius: 0.5em;
        border: solid 1px #E5E5E5;
        padding: 1em;
        -moz-transition: background-color 0.35s ease-in-out, border-color 0.35s ease-in-out;
        -webkit-transition: background-color 0.35s ease-in-out, border-color 0.35s ease-in-out;
        -ms-transition: background-color 0.35s ease-in-out, border-color 0.35s ease-in-out;
        transition: background-color 0.35s ease-in-out, border-color 0.35s ease-in-out;
    }

        input[type="text"]:focus,
         input[type="email"]:focus,
         input[type="password"]:focus,
         select:focus,
        m textarea:focus {
            background: #fff;
            border-color: #df7366;
        }

     input[type="text"],
     input[type="email"],
    input[type="password"],
     select {
        line-height: 1em;
    }

    form textarea {
        min-height: 9em;
    }

    form .formerize-placeholder {
        color: #555 !important;
    }

    form ::-webkit-input-placeholder {
        color: #555 !important;
    }

    form :-moz-placeholder {
        color: #555 !important;
    }

    form ::-moz-placeholder {
        color: #555 !important;
    }

    form :-ms-input-placeholder {
        color: #555 !important;
    }

    form ::-moz-focus-inner {
        border: 0;
    }

/* Table */

</style>

</head>
<body class="homepage">
<div id="ajax_notification"></div>
<div id="page-wrapper">
<div id="header">


<div class="inner innerlogin">
<header>
<div id="create_right">
<p><font color="white">Register a new account</font></p>
</br>
<input type="hidden" value="<?php echo $_GET['id']; ?>" id="referer" />
<span id="username_check" style="display:none;"></span>

<input id="username" type="text" class="inputbox" alt="username" size="38" maxlength="16" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Account'" value="<?php echo $_POST['username']; ?>" onkeyup="checkUsername()"/>
<br />


<input id="password" type="password" class="inputbox" alt="password" size="38" maxlength="16" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"><br />
<input id="password_repeat" type="password" class="inputbox" alt="Repeat the password" size="38" maxlength="16" placeholder="Repeat the Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repeat Password'"><br />
<input id="email" type="text" class="inputbox" alt="email" size="38" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" value="<?php echo $_POST['email']; ?>"><br />
<br />
<input type="submit" value="Register" onclick="register(<?php if($GLOBALS['registration']['captcha']==TRUE)  echo 1;  else  echo 0; ?>)" 
                id="register"/> 


<p><font color="white">Already have an account? </font><a href="?p=login">Login Here</a></p>
</div>

</div></div>
</div>
</header>
</div>
</div>
</div>

 <script type="text/javascript">
 	document.onkeydown = function(event) 
	{
		var key_press = String.fromCharCode(event.keyCode);
		var key_code = event.keyCode;
		if(key_code == 13)
			{
				register(<?php if($GLOBALS['registration']['captcha']==TRUE)  echo 1;  else  echo 0; ?>)
			}
	}
 </script>



