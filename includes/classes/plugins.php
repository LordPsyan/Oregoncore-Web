<?php

class plugins 
{
	public static function globalInit()
	{
		if($GLOBALS['enablePlugins']==true)
		{
			if(!isset($_SESSION['loaded_plugins']))
			{
				$loaded_plugins = array();
				
				$bad = array('.','..','index.html');
				$count = 0;
				
				$folder = scandir('plugins/');
				foreach($folder as $folderName)
				{
					if(!in_array($folderName,$bad))
					{
						connect::selectDB('webdb');
						if(file_exists('plugins/'.$folderName.'/config.php'))
						{
							
							include('plugins/'.$folderName.'/config.php');
						}
						
						$loaded_plugins[] = $folderName;
						$count++;
					}
				}
				
				if($count==0)
				{
					$_SESSION['loaded_plugins'] = NULL;
				}
				else
				{
					$_SESSION['loaded_plugins'] = $loaded_plugins;
				}
			}
		}
	}
	
	public static function init($type)
	{
		if($GLOBALS['enablePlugins']==true)
		{
			if($_SESSION['loaded_plugins']!=NULL)
			{
				$bad = array('.','..','index.html');
				$loaded = array();
				foreach($_SESSION['loaded_plugins'] as $folderName)
				{	
					$chk = mysql_query("SELECT COUNT(*) FROM disabled_plugins WHERE foldername='".mysql_real_escape_string($folderName)."'");
					if(mysql_result($chk,0)==0)
					{	
						$folder = scandir('plugins/' . $folderName . '/'. $type . '/');
						
						foreach($folder as $fileName)
						{
							
							if(!in_array($fileName,$bad))
							{
								$loaded[] = 'plugins/' . $folderName . '/'. $type . '/'.$fileName;
							}
						}
						$_SESSION['loaded_plugins_' . $type] = $loaded;
					}
				}
			}
		}
	}
	
	public static function load($type)
	{
		if($GLOBALS['enablePlugins']==true)
		{
		  ##########################
		  if($type == 'pages')
		  {	
		  		$count = 0;
				foreach($_SESSION['loaded_plugins_' . $type] as $filename)
				{
					$name = basename(substr($filename,0,-4));
					if($name == $_GET['p'])
					{
						include($filename);
						$count = 1;
					}
				}
				if($count == 0)
				{
					include('pages/404.php');
				}		  
			}
			###########################
			elseif($type == 'javascript')
			{
				foreach($_SESSION['loaded_plugins_' . $type] as $filename)
				{
					
					echo '<script type="text/javascript" src="'.$filename.'"></script>';
				}
			}
			###########################
			elseif($type == 'styles')
			{
				foreach($_SESSION['loaded_plugins_' . $type] as $filename)
				{
					echo '<link rel="stylesheet" href="'.$filename.'" />';
				}
			}
			###########################
			elseif($type == 'classes')
			{
				foreach($_SESSION['loaded_plugins_' . $type] as $filename)
				{
					include($filename);
				}
			}
		}
	}
}

?>