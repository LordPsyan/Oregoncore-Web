<div class="box_right_title">Dashboard</div>
<table style="width: 605px;">
<tr>
<td><span class='blue_text'>Active Connections</span></td><td><?php echo $server->getActiveConnections(); ?></td>
<td><span class='blue_text'>Active accounts(This month)</span></td><td><?php echo $server->getActiveAccounts(); ?></td>
</tr>
<tr>
     <td><span class='blue_text'>Account logged in today</span></td><td><?php echo $server->getAccountsLoggedToday(); ?></td> 
    <td><span class='blue_text'>Accounts created today</span></td><td><?php echo $server->getAccountsCreatedToday(); ?></td>
</tr>
</table>
</div>

<?php
$server->checkForNotifications();
?>

<div class="box_right">
        <div class="box_right_title">Admin Panel log</div>
        <?php
                    $server->selectDB('webdb');
                    $result = mysql_query("SELECT * FROM admin_log ORDER BY id DESC LIMIT 10");
                    if(mysql_num_rows($result)==0) {
                        echo "The admin log was empty!";
                    } else { ?>
        <table class="center">
               <tr><th>Date</th><th>User</th><th>Action</th></tr>
                    <?php
                    while($row = mysql_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo date("Y-m-d H:i:s",$row['timestamp']); ?></td>
                            <td><?php echo $account->getAccName($row['account']); ?></td>
                            <td><?php echo $row['action']; ?></td>
                        </tr>
                    <?php }
               ?>
        </table><br/>
        <a href="?p=logs&s=admin" title="Get more logs">Older logs...</a>
        <?php } ?>
</div>