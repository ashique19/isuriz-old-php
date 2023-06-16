<?php 
session_start();
require_once 'config.php';
$flag = $_POST['flag'];
$sqlkala = $_POST['sqlkala'];


if($flag == "1")
{
	$result = $con->query($sqlkala);

	while($row = $result->fetch_assoc()) {
		
		$unitid = $row['UNITID'];
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
}
else
{
	$_SESSION['clgcb'] = array();
}


	
require_once 'close.php';
?>