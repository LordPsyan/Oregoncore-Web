<?php 
define('INIT_SITE', TRUE);
require('configuration.php'); 
?>

<h2>Error log</h2>
<?php
if($GLOBALS['useDebug']==false)
{
	exit();
}
?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=clear" title="Clear the entire log">Clear log</a><hr/>
<?php
if (isset($_GET['action']) && $_GET['action']=="clear") {
$myFile = "../error.log";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "";
fwrite($fh, $stringData);
fclose($fh);
  ?><meta http-equiv="Refresh" content="0; url=<?php echo $_SERVER['PHP_SELF']; ?>"><?php
}
if(!$file = file_get_contents("../error.log")) {
  echo "The script could not get any contents from the error.log file.";
}

echo str_replace("*","<br/>",$file);

?>