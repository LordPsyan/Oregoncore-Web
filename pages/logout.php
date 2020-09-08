<?php
account::isNotLoggedIn();

echo "<h2>Logout</h2>";

account::logOut($_GET['last_page']);
?>