<?php 
    $server->selectDB('webdb'); 
 	$page = new page;
	
	$page->validatePageAccess('Logs');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
		?>
        <div class='box_right_title'>Hey! You shouldn't be here!</div>
        
		<pre>The script might have redirected you wrong. Or... did you try to HACK!? Anyways, good luck.</pre>
        
        <a href="?p=logs&s=voteshop" class="content_hider">Vote Shop logs</a>
		<a href="?p=logs&s=donateshop" class="content_hider">Donation Shop logs</a>
		<?php
	 }
?>