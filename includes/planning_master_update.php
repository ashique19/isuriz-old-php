<?php 
session_start();
include 'config.php';
$userid =  $_SESSION['userid'];
$myTableArray = serialize(explode(",",$_POST['myTableArray']));
//die($myTableArray);
$result = mysqli_query($con," UPDATE search_data SET all_clg_list = '". $myTableArray."'  WHERE createdby = '". $userid."' ");
if($result)
{
	echo "List Successfuly Updated";
}
else
{
	echo "fail";
}
include 'close.php';
?>