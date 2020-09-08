<?php 

#################
# Not finished. #
#################

?>
<div class='box_two_title'>Support</div>
<?php exit('This page was never completed.'); ?>
<table class='splashWebformLink'>
       <tr>
           <td>
           <a href="?p=support&do=email">
           <span class="splashWebformLogo"></span>
           <span class="webformText">Email Support</span></a>
           </td>
           <td>
           <a href="?p=support&do=faq">
           <span class="splashWebformLogo"></span>
           <span class="webformText">FaQ</span></a>
           </td>
       </tr>
</table> 
<?php 
if (isset($_GET['do']) && $_GET['do']=="email")
	support::loadEmailForm();
?>      