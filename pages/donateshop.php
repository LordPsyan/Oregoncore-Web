<div id="overlay"></div>
<div id="wrapper">

<?php include "header.php" ?>

<div id="leftcontent">
<div class="box_two">
<?php 
 account::isNotLoggedIn();

 /* Declare some general variables */ 
 $shopPage = mysql_real_escape_string($_GET['p']);
 $shopVar = "donate";
 $shopCurrency = $GLOBALS['donation']['coins_name'];
 
 $selected = 'selected="selected"';
 ///////////////////////////////
 ?>
<div class='box_two_title'>Donation Shop

<div id='cartHolder' onclick='window.location="?p=cart"'>Loading Cart...</div> 
        <div id='cartArrow'>
        <img src='styles/default/images/arrow.png' border='none'/></div>
</div>

<?php
if($GLOBALS[$shopVar.'Shop']['enableShop']==FALSE)
	echo "<span class='attention'><b>Attention! </b>The shop is currently closed. Please check back later.</span>";
else 
{
?>

<span class='currency'><?php echo $shopCurrency; ?>: 
<?php echo account::loadDP($_SESSION['cw_user']); ?></span>
<?php if (!isset($_GET['search'])) { $inputValue = "Search for an item..."; } else { $inputValue = $_GET['search_value']; } 

if($GLOBALS[$shopVar.'Shop']['shopType']==1)
{
	//Search enabled.
?>
<center>
        <form action="?p=<?php echo $shopPage; ?>" method="get">
        <input type="hidden" name="p" value="<?php echo $shopPage; ?>">
        <table> <tr valign="middle">
            <td><input type="text" onclick="this.value=''" value="<?php echo $inputValue; ?>" name="search_value"></td>          
            <td><input type="submit" value="Search" name="search"></td>
            <tr>
        </table>
        <?php if($GLOBALS[$shopVar.'Shop']['enableAdvancedSearch']==TRUE) { ?> <br/>
        Advanced Search<br/>
		<table width="56%">
		                   <tr>	<td>	
                            <select name="q" style="width: 100%">
                                <option>--Quality--</option>
                                <option value="0" <?php if(isset($_GET['q']) && $_GET['q']==0 && $_GET['q']!="--Quality--" 
								&& isset($_GET['q'])) 
								{ echo $selected; } ?>>
                                Poor</option>
                                <option value="1" <?php if(isset($_GET['q']) && $_GET['q']==1) { echo $selected; } ?>>Common</option>
                                <option value="2" <?php if(isset($_GET['q']) && $_GET['q']==2) { echo $selected; } ?>>Uncommon</option>
                                <option value="3" <?php if(isset($_GET['q']) && $_GET['q']==3) { echo $selected; } ?>>Rare</option>
                                <option value="4" <?php if(isset($_GET['q']) && $_GET['q']==4) { echo $selected; } ?>>Epic</option>
                                <option value="5" <?php if(isset($_GET['q']) && $_GET['q']==5) { echo $selected; } ?>>Legendary</option>
                                <option value="7" <?php if(isset($_GET['q']) && $_GET['q']==7) { echo $selected; } ?>>Heirloom</option>
                            </select>	
                           </td>
                           <td>	<select name="r" style="width: 100%">
                                    <option>--Results--</option>
                                    <option value="50" <?php if(isset($_GET['r']) && $_GET['r']==50) { echo $selected; }?>>50</option>
                                    <option value="100" <?php if(isset($_GET['r']) && $_GET['r']==100) { echo $selected; }?>>100</option>
                                    <option value="150" <?php if(isset($_GET['r']) && $_GET['r']==150) { echo $selected; }?>>150</option>
                                    <option value="200" <?php if(isset($_GET['r']) && $_GET['r']==200) { echo $selected; }?>>200</option>
                            </select>	
                        
                            </td>
                           	</tr>
                            <tr>	
                            <td>	
								<select name="t" style="width: 100%">
                                <option>--Type--</option>
                                <option value="0" <?php if(isset($_GET['t']) && $_GET['t']==0 && $_GET['t']!="--Type--"
								&& isset($_GET['q'])) 
								{ echo $selected; } ?>>Consumable</option>
                                <option value="1" <?php if(isset($_GET['t']) && $_GET['t']==1) { echo $selected; } ?>>Container</option>
                                <option value="2" <?php if(isset($_GET['t']) && $_GET['t']==2) { echo $selected; } ?>>Weapons</option>
                                <option value="3" <?php if(isset($_GET['t']) && $_GET['t']==3) { echo $selected; } ?>>Gem</option>
                                <option value="4" <?php if(isset($_GET['t']) && $_GET['t']==4) { echo $selected; } ?>>Armor</option>
                                <option value="15" <?php if(isset($_GET['t']) && $_GET['t']==15) { echo $selected; } ?>>Miscellaneous</option>
                                <option value="16"<?php if(isset($_GET['t']) && $_GET['t']==16) { echo $selected; } ?>>Glyph</option>
                                <option value="15-5" <?php if(isset($_GET['t']) && $_GET['t']=="15-5") { echo $selected; } ?>>Mount</option>
                                <option value="15-2" <?php if(isset($_GET['t']) && $_GET['t']=="15-2") { echo $selected; } ?>>Pet</option>
                                </select>	
                           </td> 
                           <td>	 
                                <input type="checkbox" name="st"  value="8"/> Heroic
                            </td>
                           	</tr>
                            <tr>
                                <td>
                                <select name="f" style="width: 100%">
                                    <option>--Faction--</option>
                                    <option value="1" <?php if(isset($_GET['f']) && $_GET['f']==1) { echo $selected; }?>>Horde Only</option>
                                    <option value="2" <?php if(isset($_GET['f']) && $_GET['f']==2) { echo $selected; }?>>Alliance Only</option>
                                </select>
                                </td>
                                <td>
                                <select name="c" style="width: 100%">
                                    <option>--Class--</option>
                                    <option value="1" <?php if(isset($_GET['c']) && $_GET['c']==1) { echo $selected; }?>>Warrior Only</option>
                                    <option value="2" <?php if(isset($_GET['c']) && $_GET['c']==2) { echo $selected; }?>>Paladin Only</option>
                                    <option value="4" <?php if(isset($_GET['c']) && $_GET['c']==4) { echo $selected; }?>>Hunter Only</option>
                                    <option value="8" <?php if(isset($_GET['c']) && $_GET['c']==8) { echo $selected; }?>>Rogue Only</option>
                                    <option value="16" <?php if(isset($_GET['c']) && $_GET['c']==16) { echo $selected; }?>>Priest Only</option>
                                    <option value="32" <?php if(isset($_GET['c']) && $_GET['c']==32) { echo $selected; }?>>Death Knight Only</option>
                                    <option value="64" <?php if(isset($_GET['c']) && $_GET['c']==64) { echo $selected; }?>>Shaman Only</option>
                                    <option value="128" <?php if(isset($_GET['c']) && $_GET['c']==128) { echo $selected; }?>>Mage Only</option>
                                    <option value="256" <?php if(isset($_GET['c']) && $_GET['c']==256) { echo $selected; }?>>Warlock Only</option>
                                    <option value="1024" <?php if(isset($_GET['c']) && $_GET['c']==1024) { echo $selected; }?>>Druid Only</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                            <select name="ilfrom" style="width: 100%">
                                            <option>--Item level from--</option>
                                            <?php
											    for ($i = 1; $i <= $GLOBALS['maxItemLevel']; $i++) 
												{
													 if($_GET['ilfrom']==$i)
														 echo "<option selected='selected'>";
													 else
														 echo "<option>";

													echo $i."</option>";
												}
											?>
                                    </select>	
                                </td>
                                <td>
                                            <select name="ilto" style="width: 100%">
                                            <option>--Item level to--</option>
                                            <?php
											    for ($i = $GLOBALS['maxItemLevel']; $i >= 1; $i--) 
												{
													 if($_GET['ilto']==$i)
														 echo "<option selected='selected'>";
													 else
														 echo "<option>";

													echo $i."</option>";
												}
											?>
                                    </select>	
                                </td>
                            </tr>
        </table>
		<?php } ?>
        </form><br/>
</center> 
<?php 
if (isset($_GET['search'])) {
		shop::search($_GET['search_value'],$shopVar,$_GET['q'],$_GET['t'],$_GET['ilfrom'],$_GET['ilto'],$_GET['r'],$_GET['f'],$_GET['c'],$_GET['st']);
	}
}
elseif($GLOBALS[$shopVar.'Shop']['shopType']==2)
{
	//List all items.
		shop::listAll($shopVar);	
	}
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