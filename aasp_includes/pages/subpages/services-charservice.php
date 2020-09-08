<?php $page = new page; 
$server = new server;
$account = new account;
?>
	 
<div class="box_right_title">Character Services</div>
<table class="center">
<tr><th>Service</th><th>Price</th><th>Currency</th><th>Status</th></tr>
<?php
$result = mysql_query("SELECT * FROM service_prices");
while($row = mysql_fetch_assoc($result)) { ?>
	<tr>
        <td><?php echo $row['service']; ?></td>
        <td><input type="text" value="<?php echo $row['price']; ?>" style="width: 50px;" id="<?php echo $row['service']; ?>_price" class="noremove"/></td>
        <td><select style="width: 200px;" id="<?php echo $row['service']; ?>_currency">
             <option value="vp" <?php if ($row['currency']=='vp') echo 'selected'; ?>>Vote Points</option>
             <option value="dp" <?php if ($row['currency']=='dp') echo 'selected'; ?>><?php echo $GLOBALS['donation']['coins_name']; ?></option>
        </select></td>
        <td><select style="width: 150px;" id="<?php echo $row['service']; ?>_enabled">
             <option value="true" <?php if ($row['enabled']=='TRUE') echo 'selected'; ?>>Enabled</option>
             <option value="false" <?php if ($row['enabled']=='FALSE') echo 'selected'; ?>>Disabled</option>
        </select></td>
        <td><input type="submit" value="Save" onclick="saveServicePrice('<?php echo $row['service']; ?>')"/>
    </tr>
<?php }
?>
</table>