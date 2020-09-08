<?php account::isNotLoggedIn(); ?>
<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">
<?php
     website::getNews();
	 
	 if ($GLOBALS['enableSlideShow']==false && $GLOBALS['news']['enable']==false)  
	 {
		 buildError("<b>Configuration file error.</b>Neither the slideshow or the news are displayed, the homepage will be empty.");
		 echo "Seems like the homepage was empty!";
	 }
?>

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