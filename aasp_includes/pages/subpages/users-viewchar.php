<?php $page = new page; $server = new server; $account = new account; $character = new character; ?>
<div class="box_right_title"><?php echo $page->titleLink(); ?> &raquo; Manage Character</div>
Selected character:  <?php echo $account->getCharName($_GET['guid'],$_GET['rid']); ?>
<?php
$server->connectToRealmDB($_GET['rid']);

$usersTotal = mysql_query("SELECT name,race,account,class,level,money,leveltime,totaltime,online,latency,gender FROM characters WHERE guid='".$_GET['guid']."'");
$row = mysql_fetch_assoc($usersTotal);
?>
<hr/>
<table style="width: 100%;">
<tr>
    <td>Character Name</td>
    <td><input type="text" value="<?php echo $row['name']; ?>" class="noremove" id="editchar_name"/></td>
</tr>
<tr>
    <td>Account</td>
    <td><input type="text" value="<?php echo $account->getAccName($row['account']); ?>" class="noremove" id="editchar_accname"/>
    <a href="?p=users&s=manage&user=<?php echo strtolower($account->getAccName($row['account'])); ?>">View</a></td>
</tr>
<tr>
    <td>Race</td>
    <td>
    	<select id="editchar_race">
        	<option <?php if($row['race']==1) echo 'selected'; ?> value="1">Human</option>
            <option <?php if($row['race']==3) echo 'selected'; ?> value="3">Dwarf</option>
            <option <?php if($row['race']==4) echo 'selected'; ?> value="4">Night Elf</option>
            <option <?php if($row['race']==7) echo 'selected'; ?> value="7">Gnome</option>
            <option <?php if($row['race']==11) echo 'selected'; ?> value="11">Dranei</option>
             <?php if($GLOBALS['core_expansion']>=3) ?>
            	<option <?php if($row['race']==22) echo 'selected'; ?> value="22">Worgen</option>
            <option <?php if($row['race']==2) echo 'selected'; ?> value="2">Orc</option>
            <option <?php if($row['race']==6) echo 'selected'; ?> value="6">Tauren</option>
            <option <?php if($row['race']==8) echo 'selected'; ?> value="8">Troll</option>
            <option <?php if($row['race']==5) echo 'selected'; ?> value="5">Undead</option>
			<option <?php if($row['race']==10) echo 'selected'; ?> value="10">Blood Elf</option>
            <?php if($GLOBALS['core_expansion']>=3) ?>
            	<option <?php if($row['race']==9) echo 'selected'; ?> value="9">Goblin</option>
            <?php if($GLOBALS['core_expansion']>=4) ?>
            	<option <?php if($row['race']==NULL) echo 'selected'; ?> value="NULL">Pandaren</option>    
        </select>
    </td>
</tr>
<tr>   
    <td>Class</td>
    <td>
    	<select id="editchar_class">
        	<option <?php if($row['class']==1) echo 'selected'; ?> value="1">Warrior</option>
            <option <?php if($row['class']==2) echo 'selected'; ?> value="2">Paladin</option>
            <option <?php if($row['class']==11) echo 'selected'; ?> value="11">Druid</option>
            <option <?php if($row['class']==3) echo 'selected'; ?> value="3">Hunter</option>
            <option <?php if($row['class']==5) echo 'selected'; ?> value="5">Priest</option>
             <?php if($GLOBALS['core_expansion']>=2) ?>
            	<option <?php if($row['class']==6) echo 'selected'; ?> value="6">Death Knight</option>
            <option <?php if($row['class']==9) echo 'selected'; ?> value="9">Warlock</option>
            <option <?php if($row['class']==7) echo 'selected'; ?> value="7">Shaman</option>
            <option <?php if($row['class']==4) echo 'selected'; ?> value="4">Rogue</option>
            <option <?php if($row['class']==8) echo 'selected'; ?> value="8">Mage</option>
            <?php if($GLOBALS['core_expansion']>=4) ?>
            	<option <?php if($row['class']==12) echo 'selected'; ?> value="12">Monk</option>
        </select>
    </td>
</tr>
<tr>   
    <td>Gender</td>
    <td>
    	<select id="editchar_gender">
        	<option <?php if($row['gender']==0) echo 'selected'; ?> value="0">Male</option>
            <option <?php if($row['gender']==1) echo 'selected'; ?> value="1">Female</option>
        </select>
    </td>
</tr>
<tr>
    <td>Level</td>
    <td><input type="text" value="<?php echo $row['level']; ?>" class="noremove" id="editchar_level"/></td>
</tr>
<tr>    
    <td>Money (Gold)</td>
    <td><input type="text" value="<?php echo floor($row['money'] / 10000); ?>" class="noremove" id="editchar_money"/></td>
</tr>
<tr>
    <td>Leveling Time</td>
    <td><input type="text" value="<?php echo $row['leveltime']; ?>" disabled="disabled"/></td>
</tr>
<tr>    
    <td>Total Time</td>
    <td><input type="text" value="<?php echo $row['totaltime']; ?>" disabled="disabled"/></td>
</tr>
<tr>
    <td>Status</td>
    <td>
	<?php if ($row['online']==0)
				  echo '<input type="text" value="Offline" disabled="disabled"/>';
			  else
			  	  echo '<input type="text" value="Online" disabled="disabled"/>'; 
	?>              
    </td>
</tr>
<tr>    
    <td>Latency</td>
    <td><input type="text" value="<?php echo $row['latency']; ?>" disabled="disabled"/></td>
</tr>
<tr>
	<td></td>
    <td><input type="submit" value="Save" onclick="editChar('<?php echo $_GET['guid']; ?>','<?php echo $_GET['rid']; ?>')"/> 
    	<i>* Note</i>: You may not edit any data if the character is online.</td>
</tr>
</table>
<hr/>