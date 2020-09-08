<?php 
	$server->selectDB('webdb'); 
 	$page = new page;
	
	$page->validatePageAccess('Services');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} 
	else 
	{
		echo '<h2>Forbidden!</h2>Or actually... there\'s nothing here!'; 
	}
?>