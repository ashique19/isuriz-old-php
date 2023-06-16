<?php 
include('includes/config_guest.php');

$sql = "SELECT * FROM hd2019 WHERE `INSTNM` LIKE '%".$_GET['q']."%' LIMIT 0,7 ";

$result = $con->query($sql);

$names = [];

$html = "";

if ($result->num_rows > 0)
{

    while($row = $result->fetch_assoc()) {
        $names[] = $row['INSTNM'];
    }

}

if( count($names) > 0 )
{



    foreach( $names as $name )
    {

        $html .= '<form method="POST" action="/guest_college-search.php"><input name="btnsearchschoolname" type="hidden" /><button class="btn btn-info" type="submit" name="search_schoolname" value="'.$name.'" >'.$name.'</button></form>';

    }

}

echo $html;

?>