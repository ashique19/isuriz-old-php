<?php
require_once('includes/config.php');
session_start();

function user()
{

    print_r(123);

    $user = null;

    if (isset($_SESSION['userid']))
    {
        
        $q = mysqli_query($con,"SELECT * FROM tbl_users WHERE id = '".$_SESSION['userid']."' LIMIT 0,1 ");
        
        if(mysqli_num_rows($q) > 0){
            while($row = mysqli_fetch_array($q)){
                $user = $row;
            }
        }

    }

    return $user;

}


function profile()
{

    $profile = null;

    if (isset($_SESSION['userid']))
    {
        
        $resprofile = mysqli_query($con,"SELECT * FROM profile_data WHERE createdby = '". $_SESSION['userid']."' ORDER BY id DESC limit 0,1");
		
        if(mysqli_num_rows($resprofile) > 0)
        {
            while ($rowfilters = mysqli_fetch_assoc($resprofile))
            {
                $profile = $rowfilters;
            }
        }

    }

    return $profile;

}

?>