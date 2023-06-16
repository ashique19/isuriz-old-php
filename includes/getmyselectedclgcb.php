<?php
session_start();
require_once 'config.php';
if(isset($_SESSION['clgcb']) && count($_SESSION['clgcb']) > 0){
	$clgcblist = implode(",",$_SESSION['clgcb']);
	$sql = "SELECT * FROM hd2019 WHERE UNITID IN ($clgcblist)";
	$result = $con->query($sql);	
	
	/*
	<span class="d-selectclgs">
		<label class="checkbox-label" for="selectclg1">
		<input type="checkbox" id="selectclg1" name="selectclg1">
		<span class="checkbox-custom circular"></span>
		</label>
		</span>
	*/	
		
	while($row = $result->fetch_assoc()) {
		echo '<li class="list-group-item">
		<span class="deleteclg" onclick="removeselectedclgcb('.$row['UNITID'].')">
		<i class="mr-8 ml-8 fa fa-close"></i>
		</span><a  href="school-profile/'.$row['slug'].'" target="_blank">'.$row['INSTNM'].'</li></a> ';
	}
}  
else
{
  echo '<li class="list-group-item">Nothing Selected</li>';
}
require_once 'close.php';
?>