<?php
if($GLOBALS['social']['enableFacebookModule']==TRUE) { 
?>
	<div class="box_one">
	<div class="box_one_title">Find us on Facebook</div>
    <div id="fb-root"></div>
		<script>
		(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    
    <div class="fb-like-box" data-href="<?php echo $GLOBALS['social']['facebookGroupURL']; ?>" id="fb" data-colorscheme="dark" data-show-faces="false" data-border-color="#333" data-stream="true" data-header="false"></div>
    </div>
<?php } ?>