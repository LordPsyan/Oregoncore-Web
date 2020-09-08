<?php 
	 $server->selectDB('webdb'); 
 	 $page = new page;
	 
	 $page->validatePageAccess('Donations');
	 
     if($page->validateSubPage() == TRUE) {
		 $page->outputSubPage();
	 } else {
		$donationsTotal = mysql_query("SELECT mc_gross FROM payments_log");
		$donationsTotalAmount = 0;
		while($row = mysql_fetch_assoc($donationsTotal)) 
		{
			$donationsTotalAmount = $donationsTotalAmount + $row['mc_gross'];
		}
		
		$donationsThisMonth = mysql_query("SELECT mc_gross FROM payments_log WHERE paymentdate LIKE '%".date('Y-md')."%'");
		$donationsThisMonthAmount = 0;
		while($row = mysql_fetch_assoc($donationsThisMonth)) 
		{
			$donationsThisMonthAmount = $donationsThisMonthAmount + $row['mc_gross'];
		}
		
		$q = mysql_query("SELECT mc_gross,userid FROM payments_log ORDER BY paymentdate DESC LIMIT 1");
		$row = mysql_fetch_assoc($q);
		$donationLatestAmount = $row['mc_gross'];
		
		$donationLatest = $account->getAccName($row['userid']);
?>
<div class="box_right_title">Donations Overview</div>
<table style="width: 100%;">
<tr>
<td><span class='blue_text'>Total donations</span></td><td><?php echo mysql_num_rows($donationsTotal); ?></td>
<td><span class='blue_text'>Total donation amount</span></td><td><?php echo round($donationsTotalAmount,0); ?>$</td>
</tr>
<tr>
    <td><span class='blue_text'>Donations this month</span></td><td><?php echo mysql_num_rows($donationsThisMonth); ?></td>
    <td><span class='blue_text'>Donation amount this month</span></td><td><?php echo round($donationsThisMonthAmount,0); ?>$</td>
</tr>
<tr>
    <td><span class='blue_text'>Latest donation amount</span></td><td><?php echo round($donationLatestAmount); ?>$</td>
    <td><span class='blue_text'>Latest donator</span></td><td><?php echo $donationLatest; ?></td>
</tr>
</table>
<hr/>
<a href="?p=donations&s=browse" class="content_hider">Browse Donations</a>
<?php } ?>