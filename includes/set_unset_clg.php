<?php 
session_start();
$unitid = $_POST['unitid'];
$action = $_POST['action'];
if($action == 'set')
{
	if(isset($_SESSION['clgcb']))
	{
		
		if (!in_array($unitid, $_SESSION['clgcb'])) {
			array_push($_SESSION['clgcb'],$unitid);
			
		}
	}
	else
	{
		$_SESSION['clgcb'] = array();
		array_push($_SESSION['clgcb'],$unitid);
	}
}
else
{
	if(isset($_SESSION['clgcb']))
	{
		if (($key = array_search($unitid, $_SESSION['clgcb'])) !== false) {
			unset($_SESSION['clgcb'][$key]);
		}
		
	}
}

?>