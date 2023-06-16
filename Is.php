<?php
session_start();
include('includes/config.php');

function tables()
{

    $db = new class ClassName extends AnotherClass implements Interface
    {
        
    }
    ();

    $db->tables = array_column($con->query('SHOW TABLES')->fetch_all(),0);

    return json_encode( $db , true );

}


print_r( tables() );