<?php  
if ($compression['gzip'] == true) 
{
 if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) 
 	ob_start("ob_gzhandler");
}

if ($compression['sanitize_output'] == true) 
{
	function sanitize_output($buffer) 
	{
	$search = array(
		'/\>[^\S ]+/s', //strip whitespaces after tags, except space
		'/[^\S ]+\</s', //strip whitespaces before tags, except space
		'/(\s)+/s'  // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);
	$buffer = preg_replace($search, $replace, $buffer);
	return $buffer;
}

ob_start("sanitize_output");
}
?>