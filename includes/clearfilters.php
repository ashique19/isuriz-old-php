<?php 
session_start();
if(isset($_SESSION['dataform1']))
{
	unset($_SESSION['dataform1']);
}
if(isset($_SESSION['search_schoolname']))
{
	unset($_SESSION['search_schoolname']);
}
if(isset($_SESSION['clgcb']))
{
	unset($_SESSION['clgcb']);
}

if(isset($_SESSION['dataform1']) || isset($_SESSION['search_schoolname'])  || isset($_SESSION['clgcb']))
{
	echo "fail";
}
else
{
	$_SESSION['dataform1'] = '';
	echo "success";
}

?>