<?php 
if(!isset($_GET['p']))
	$page = "home";
else
	$page = $_GET['p'];
	
if ($GLOBALS['enableSlideShow']==true && !isset($_COOKIE['hideslider']) && $page == "home") { ?>
<div class="main_view">
    <div class="window">
        <div class="image_reel">
        		<?php website::getSlideShowImages(); ?>
        </div>
    </div>
    <div class="paging">
        <?php website::getSlideShowImageNumbers(); ?>
    </div>
</div>
<?php } ?>