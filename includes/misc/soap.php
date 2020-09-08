<?php	
function sendSoap($command,$username,$password,$host,$soapport) {

$client = new SoapClient(NULL,
	array(
		"location" => "http://$host:$soapport/",
		"uri" => "urn:TC",
		"style" => SOAP_RPC,
		'login' => $username,
		'password' => $password
	));
try 
{
    $result = $client->executeCommand(new SoapParam($command, "command"));

    echo "Command succeeded! Output:<br />\n";
    echo $result;
}
catch (Exception $e)
{
    echo "Command failed! Reason:<br />\n";
    echo $e->getMessage();
	}
}

?>