<script type="text/javascript" src="javascript/main.js"></script>
<?php
####SHOP CARTS####
if($_GET['p']=='donateshop') 
{ ?>
<script type="text/javascript">
		$(document).ready(function() {
			loadMiniCart("donateCart");
		});
</script>
<?php }

if($_GET['p']=='voteshop') 
{ ?>
	<script type="text/javascript">
            $(document).ready(function() {
                loadMiniCart("voteCart");
            });
    </script>
<?php } 


{
?>
	
<?php 
}
if($GLOBALS['core_expansion']>2) 
	echo '<script type="text/javascript" src="http://cdn.cavernoftime.com/api/tooltip.js"></script>';
else
	echo '<script type="text/javascript" src="http://cdn.cavernoftime.com/api/tooltip.js"></script>';

####CURSOR TRACKER####
if($_GET['p']=='donateshop' || $_GET['p'] == 'voteshop') 
{ ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$(document).mousemove(function(e){
		   mouseY = e.pageY;
      });
	});
	</script>
<?php }

####FACEBOOK####
if($GLOBALS['social']['enableFacebookModule']==TRUE) 
{  ?>
	<script type="text/javascript">
		$(document).ready(function() {
				var box_width_one = $(".box_one").width();
				$("#fb").attr('width', box_width_one);
		});
	</script>
<?php 
}

####SERVER STATUS######
if($GLOBALS['serverStatus']['enable']==true) 
{
	?>
	<script type="text/javascript">
        $(document).ready(function() {
            $.post("includes/scripts/misc.php", { serverStatus: true },
               function(data) {
                   $("#server_status").html(data);
                   $(".srv_status_po").hover(function() {
                        $(".srv_status_text").fadeIn("fast");
                         }, function() {
                        $(".srv_status_text").fadeOut("fast");
                        });
          });
        });
    </script>
<?php 
}

plugins::load('javascript');
	
?>

