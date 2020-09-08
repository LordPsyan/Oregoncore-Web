<?php 
	$server->selectDB('webdb'); 
 	$page = new page;
	
	$page->validatePageAccess('Interface');
	
    if($page->validateSubPage() == TRUE) {
		$page->outputSubPage();
	} else {
?>
<div class="box_right_title">Template</div>          
    
 Here you can choose which template that should be active on your website. This is also where you install new themes for your website.<br/><br/>
 <h3>Choose Template</h3>
        <select id="choose_template">
                <?php
                $result = mysql_query("SELECT * FROM template ORDER BY id ASC");
                while($row = mysql_fetch_assoc($result)) {
                    if($row['applied']==1) 
                        echo "<option selected='selected' value='".$row['id']."'>[Active] ";
                    else 
                        echo "<option value='".$row['id']."'>";
                        
                    echo $row['name']."</option>";
                }
                ?>
        </select>
        <input type="submit" value="Save" onclick="setTemplate()"/><hr/><p/>
        
        <h3>Install a new template</h3>
        <a href="#" onclick="templateInstallGuide()">How to install new templates on your website</a><br/><br/><br/>
        Path to the template<br/>
        <input type="text" id="installtemplate_path"/><br/>
        Choose a name<br/>
        <input type="text" id="installtemplate_name"/><br/>
        <input type="submit" value="Install" onclick="installTemplate()"/>
        <hr/>
        <p/>
        
        <h3>Uninstall a template</h3>
        <select id="uninstall_template_id">
                <?php
                $result = mysql_query("SELECT * FROM template ORDER BY id ASC");
                while($row = mysql_fetch_assoc($result)) {
                    if($row['applied']==1) 
                        echo "<option selected='selected' value='".$row['id']."'>[Active] ";
                    else 
                        echo "<option value='".$row['id']."'>";
                        
                    echo $row['name']."</option>";
                }
                ?>
        </select>
        <input type="submit" value="Uninstall" onclick="uninstallTemplate()"/> 
 <?php } ?>