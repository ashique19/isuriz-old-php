<?php
include 'header-dashboard.php';
//include('includes/config.php');
//get User id by session

$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$uid = hex2bin($_REQUEST["uid"]);
$udata = explode("_", $uid);
$to_user_msg_id = "";
$message = '';
$sql = "";


//$sql = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $userid . "' ";
if($usertype != "College_Counselor"){
    //$sql = "SELECT * FROM `counselor_dash_message` WHERE from_id = '" . $userid . "' ";
    $sql = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $userid . "' ";
}else{
    //$sql = "SELECT * FROM `counselor_dash_message` WHERE to_id = '" . $userid . "' ";
    $sql = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $userid . "' ";
}
$result_n = $con->query($sql);
if ($result_n->num_rows > 0) {
    $total_request = $result_n->num_rows;
}

if(isset($_POST['delete-btn']))
{
    $sql = "DELETE FROM `counselor_detail` WHERE user_id= '".$userid."'";
    $result_d = $con->query($sql);
    if ($result_d == TRUE) {
      $message_delete = "Your listing has now been deleted";
    } else {
      echo "Error deleting record: " . $con->error;
    }
}

$query = "SELECT * FROM `tbl_users` inner join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE counselor_detail.user_id='" . $userid . "' ";
$results = $con->query($query);
$listing_info = $results->fetch_assoc();

//print_r($listing_info);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Isuriz</title>
        <!-- =============== VENDOR STYLES ===============-->
        <!-- FONT AWESOME-->
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">
        <!-- SIMPLE LINE ICONS-->
        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
        <!-- ANIMATE.CSS-->
        <link rel="stylesheet" href="vendor/animate.css/animate.css">
        <!-- WHIRL (spinners)-->
        <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
        <!-- =============== PAGE VENDOR STYLES ===============-->
        <!-- WEATHER ICONS-->
        <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
        <!-- =============== BOOTSTRAP STYLES ===============-->
        <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
        <!-- =============== APP STYLES ===============-->

        <!-- Custom styles for this template-->
        <!-- <link href="counselor-dashboard-assets/css/sb-admin-2.css" rel="stylesheet"> -->



        <link rel="stylesheet" href="css/app.css" id="maincss">
        <link rel="stylesheet" href="css/dashboard.css" >
        <link rel="stylesheet" href="css/site.css" id="maincss">
        <style>
			.m2-3{
			    margin-left: 0rem!important;
			}
            .result-list {
        border-top: 1px solid #ddd;
        padding: 10px 20px;
    }
    .result-list:hover {
        background: #9e9e9e0a;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
    }
            .mx-2{
                display: none;
            }
            .modal{
                background:rgba(0,0,0,0.5) !important;
            }
            .modal-backdrop{
                position:relative !important;
            }
            @media only screen and (max-width: 767px) {
                .card-body .h1,.card-body .h2{
                    font-size:20px;
                }
                .card-body .text-xs{
                    font-size:12px;
                    line-height:20px;
                }
                .card-body i{
                    font-size:1.5rem;
                }
                .dashboard-statics-counter .col-xl-3.col-md-6.mb-4{
                    padding-left:20px;
                    padding-right:20px;
                }
               .header-notification {
                    display:block;
                }
                h3#welcometext-mb {
                    padding-top: 15px;
                }  
                button#mybutton {
                    padding: 11px 68px !important;
                }   
                a.btn.float-right.mybluebtn.order-sm-2.mb-4.mb-sm-0 {
                    padding: 10px 66px !important;
                }
            }
            .slick-list{
                display:grid !important;
            }
            #previewImg{
                width:inherit;
            }
            .topnavbar .dropdown .dropdown-menu-right {
                overflow-x: hidden;
                width: 100%;
                max-height: 100px;
                overflow-y: auto; 
            }
            .header-notification .dropdownAlertsItem img.rounded-circle {
                width: 32px;
                height: 32px;
            }
        </style>

    </head>
    <body>

        <div class="wrapper">
            <!-- top navbar-->
                    
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="/asset-css/custom.css">
<link rel="stylesheet" href="/asset-css/custom-xs.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

         <?php
         // include 'top-nav-no-left-menu.php';
         include('partials/header-admin.php');
         ?>
         
            <!-- sidebar-->
            <aside class="aside-container">
                <!-- START Sidebar (left)-->
                <div class="aside-inner">
                    <!-- ************left side navbar menu items****************** -->
                    <?php include 'counselor-das-sidebar.php'; ?>
                    <!-- ************end left side navbar menu items****************** -->
                </div>
                <!-- END Sidebar (left)-->
            </aside>
            <section class="section-container">
                <!-- Page content-->
                <div class="content-wrapper">
                    <div class="content-heading" id="welcometext-div">
                        <div><h3 class="text-center mb-0" id="welcometext-mb" style="color: #3a3a3a">College Counselor Hub</h3><small data-localize="dashboard.WELCOME"></small></div>
                    </div>

                    <!-- 
                    <div class="row">
                       <div class="col-xl-2 col-lg-6 col-md-3">
                         
                       </div>
                       <div class="col-xl-8 col-md-6 home-search-bar">
                         
                          <form action="#!" style="width: 100%">
                             <div class="input-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Search for a College by Name"><span class="input-group-btn">
                                <button class="btn btn-secondary btn-lg" type="submit"><i class="fa fa-search"></i></button></span>
                             </div>
                          </form>
                                              
                         
                       </div>
                       <div class="col-xl-2 col-lg-6 col-md-3">
                         
                       </div>
                    </div>
                    -->
                    <div class="row">
                        <!-- START dashboard main content-->
                        <div class="col-xl-12">
                            <!-- START -->
                            <div class="card card-default card-demo grid-card mb-4" >
                                <div class="card-header grid-card-header">
                                    <!-- page content start here -->


                                    <div class="row mb-5 dashboard-statics-counter">
                                        <!-- Earnings (Monthly) Card Example -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo (isset($total_request)) ? $total_request : '0'; ?></div>
                                                            <div class="text-xs font-weight-bold"><a style="color: #656565;" href="total_requests.php">Total Requests</a></div>
                                                        </div>
                                                        <div class="col-auto"> <i class="far fa-smile fa-2x text-primary"></i> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Earnings (Monthly) Card Example -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-success shadow">
                                                <div class="card-body">


                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="h2 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        <?php
                                                                        $total_request_accept = requestStatusCalculator($userid, 1, 0, 0);
                                                                        echo (!empty($total_request_accept)) ? $total_request_accept : '0';
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-xs"><a style="color: #656565;" href="accepted_requests.php">Accepted Requests</a></div>

                                                        </div>
                                                        <div class="col-auto"> <i class="far fa-check-circle fa-2x text-success"></i> </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>                     
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Earnings (Monthly) Card Example -->
                                      <!--  <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-info shadow">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="h2 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        <?php
                                                                        $total_request_reject// = requestStatusCalculator($userid, 0, 1, 0);
                                                                      //  echo (!empty($total_request_reject)) ? $total_request_reject : '0';
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-xs">Rejected Requests</div>

                                                        </div>
                                                        <div class="col-auto"> <i class="far fa-times-circle fa-2x text-danger"></i> </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- Pending Requests Card Example -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-warning shadow">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="h2 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        <?php
                                                                        $total_request_pending = requestStatusCalculator($userid, 0, 0, 1);
                                                                        echo (!empty($total_request_pending)) ? $total_request_pending : '0';
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if(!empty($total_request_pending)) {?>
                                                            <div class="text-xs"><a style="color: #656565;" href="pending_request.php">Pending Requests</a></div>
                                                        <?php } else { ?>
                                                            <div class="text-xs">Pending Requests</div>
                                                        <?php } ?>
                                                            </div>
                                                        <div class="col-auto"> <i class="far fa-pause-circle fa-2x text-warning"></i> </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <?php
                                    if ($_SESSION['usertype'] == "College_Counselor") :


                                        $profile_picture = "";
                                        $sql3 = "SELECT * FROM counselor_detail 
                                        RIGHT JOIN tbl_users
                                        ON counselor_detail.user_id = tbl_users.id
                                        WHERE tbl_users.id = '" . $userid . "' ";
                                        $result = $con->query($sql3);

                                        if ($result->num_rows > 0) {
                                            $counselor_details = $result->fetch_assoc();
                                            //echo "<pre>";print_r($counselor_details);// print_r($counselor_details);
                                                                                  
                                            @$counselor_city = $counselor_details['counselor_city'];
                                            @$counselor_state = $counselor_details['counselor_state'];
                                            @$counselor_name = $counselor_details['name'];

                                            @$counselor_pnumber = $counselor_details['phoneno'];  
                                            @$counselor_fname = $counselor_details['name'];
                                            @$counselor_lname = $counselor_details['last_name'];
                                            @$councilor_bname = $counselor_details['councilor_business'];                                            


                                            @$profile_picture = $counselor_details['profile_picture'];
                                            @$counselor_overview = $counselor_details['counselor_overview'];
                                            @$counselor_fees = $counselor_details['counselor_fees'];
                                            @$other_services_fee = $counselor_details['counselor_other_services_fee'];
                                            @$description_of_services = $counselor_details['description_of_services'];
                                            @$counselor_visibility = $counselor_details['counselor_visibility'];
                                            @$counselor_address = $counselor_details['counselor_address'];
                                            @$area_served = $counselor_details['area_served'];
                                            }

                                        $message = '';
                                        if (!empty($_POST) && isset($_POST['save-btn'])) {
                                            //Save Image
                                            $profile_picture = $profile_picture;
                                            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); //valid extensions
                                            $path = "assets/counselor/";
                                            if ($_FILES['image']) {
                                                $img = $_FILES['image']['name'];
                                                $tmp = $_FILES['image']['tmp_name'];
                                                // get uploaded file's extension
                                                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                                                // can upload same image using rand function
                                                $final_image = "counselor_profile_" . rand(1000, 1000000) . $img;

                                                // check's valid format
                                                if (in_array($ext, $valid_extensions)) {
                                                    $path = $path . strtolower($final_image);
                                                    if (move_uploaded_file($tmp, $path)) {
                                                        $profile_picture = $path;
                                                    }
                                                }
                                            }
                                            $counselor_state = $_POST['state'];
                                            $counselor_city = $_POST['city'];
                                            $counselor_overview = addslashes($_POST['counselor_overview']);
                                            $fees = $_POST['fees'];
                                            $other_services_fee = addslashes($_POST['other_services_fee']);
                                            $description_of_services = addslashes($_POST['description_of_services']);
                                            $counselor_address = $_POST['counselor_address'];
                                            $area_served = $_POST['area_served'];

                                            $sql = "SELECT * FROM `counselor_detail` WHERE  user_id = '$userid' ";
                                            $result = mysqli_query($con, $sql) or ( "query failed");
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                $sql1 = "UPDATE `counselor_detail` SET 
                          `counselor_city`='$counselor_city',
                          `counselor_state`='$counselor_state',
                          `profile_picture` = '" . $profile_picture . "',
                          `counselor_overview` = '$counselor_overview',
                          counselor_fees = '$fees',
                          counselor_other_services_fee = '$other_services_fee',
                          description_of_services = '$description_of_services',
                          counselor_address = '$counselor_address',
                          area_served = '$area_served'
                           WHERE user_id = '" . $userid . "'";
                                                $result1 = mysqli_query($con, $sql1) or ( "query failed 1");
                                                if ($result1 == TRUE) {
                                                    $message .= "Your listing has been successfully updated";
                                                }
                                            } else {
                                                $sql2 = "INSERT INTO counselor_detail (user_id, counselor_city, counselor_state, profile_picture, counselor_email, counselor_overview, counselor_visibility, counselor_fees, counselor_other_services_fee, description_of_services, counselor_address, area_served)
    VALUES ('$userid','$counselor_city','$counselor_state','$profile_picture', '$emailid', '$counselor_overview', '0', '$fees', '$other_services_fee', '$description_of_services', '$counselor_address', '$area_served')";
                                                $result2 = mysqli_query($con, $sql2) or ( "query failed 2");

                                                if ($result2 == TRUE) {
                                                    $message .= "Your listing has been successfully published";
                                                }
                                            }

                                            //Name field
                                            // update into table_users

                                            if (isset($_POST['counselor_fname'])) {
                                                $name = $_POST['counselor_fname'];
                                                $lname = $_POST['counselor_lname'];
                                                $bname = $_POST['councilor_bname'];
                                                $pnumber = $_POST['counselor_pnumber'];

                                                if(preg_match("/^([a-zA-Z' ]+)$/",$name))
                                                {

                                                $sql_ = "UPDATE `tbl_users` SET `name`='" . $name . "', `last_name`='" . $lname . "', `councilor_business`='" . $bname . "', `phoneno`='" . $pnumber . "' WHERE  id = '" . $userid . "'";
                                                $result1 = mysqli_query($con, $sql_) or ( "query failed 1");
                                                if ($result1 == TRUE) {
                                                    $_SESSION['first_name'] = $name;
                                                }                                            

                                                }
                                                else
                                                {
                                                    echo "Please enter only alphabets in name field";
                                                }
                                               
                                            }

                                            echo "<meta http-equiv='refresh' content='2'>";


                                        }
                                        ?>

                                        <div class="mb-4">
                                            <div class="d-flex flex-column justify-content-between align-items-center flex-sm-row">
                                               <h1 class="h3 mb-0 order-1" id="change-text">
                                               <?php
                                                          $user_id = $_SESSION['userid'];

                                                         $sql1 = "SELECT * FROM counselor_detail WHERE user_id = '".$user_id."'";
                                                        $result = $con->query($sql1);
                                                       

                                                            if ($result->num_rows > 0) { ?>
                                                                Update/Edit Listing
                                                                    <?php 
                                                            }else{ ?>

                                                Get Listed
                                                <?php
                                            }
                                                ?>
                                                           </h1>

                                            </div>

                                            <div class="row" style="padding-top: 10px;">
                                                <div class="col-md-12">
                                                    <?php if (!empty($message)): ?>
                                                        <div class="alert alert-success">
                                                            <?php echo $message; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php 
                                                    if(!empty($message_delete)){ ?>
                                                         <div class="alert alert-success">
                                                            <?php echo $message_delete; ?>
                                                        </div>

                                                        <?php

                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Content Row -->
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 mb-12">
                                                <div class="loader"></div>
                                                <form method="post" enctype="multipart/form-data">

                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress" class="d-none">First Name</label>
                                                                <input type="text" class="form-control myinput" id="counselor_fname" name="counselor_fname" value="<?php echo (empty($counselor_fname)) ? "" : trim($counselor_fname);?>" placeholder="First Name">
                                                            </div>
                                                        </div>    
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress" class="d-none">Last Name</label>
                                                                <input type="text" class="form-control myinput" id="counselor_lname" name="counselor_lname" value="<?php echo (empty($counselor_lname)) ? "" : trim($counselor_lname);?>" placeholder="Last Name">
                                                            </div>
                                                        </div>                   
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                               <label for="inputAddress" class="d-none">Business Name</label>
                          <?php   if ((isset($counselor_address) && !empty($counselor_address)) || empty($listing_info) ) {    ?>                   
																<input type="text" class="form-control myinput" id="councilor_bname" name="councilor_bname" value="<?php echo (empty($councilor_bname)) ? "" : trim($councilor_bname);?>" placeholder="Business Name">
                                <?php   }   ?>
                                                            </div>
                                                        </div>  
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="address" class="d-none">Address</label>
                                                                                        
                    <?php   if ((isset($counselor_address) && !empty($counselor_address)) || empty($listing_info) ) {    ?>
                                                                <input type="text" class="form-control myinput" id="counselor_address" name="counselor_address" value="<?php echo (empty($counselor_address)) ? "" : trim($counselor_address); ?>" placeholder="Address" >
                                    <?php    }    ?>
                                                            </div>
                                                        </div>   
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputCity" class="d-none">City</label>
                                                                
                                                                
                    <?php  if ((isset($counselor_city) && !empty($counselor_city)) || empty($listing_info) ) {    ?>
                                                                <input type="text" class="form-control myinput" id="inputCity" name="city" value="<?php echo (empty($counselor_city)) ? "" : trim($counselor_city); ?>" placeholder="City"> 
                                    <?php    }    ?>
                                                            </div>
                                                        </div>    
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputState" class="d-none">State</label>
                                                                
                                                                
            <?php if ((isset($counselor_state) && !empty($counselor_state)) || empty($listing_info) ) {  ?>
                                                                <input type="text" class="form-control myinput" id="inputState" name="state" value="<?php echo (empty($counselor_state)) ? "" : trim($counselor_state); ?>" placeholder="State">
                                    <?php   }   ?>
                                                            </div>
                                                        </div>                   
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress" class="d-none">Email</label>
                                                                <input type="email" class="form-control myinput" name="full_name" value="<?php echo (empty($emailid)) ? "" : trim($emailid); ?>" placeholder="Email" required>
                                                            </div>
                                                        </div>    
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress" class="d-none">Telephone Number</label>
                                                                <input type="number" class="form-control myinput" id="counselor_pnumber" name="counselor_pnumber" value="<?php echo (empty($counselor_pnumber)) ? "" : trim($counselor_pnumber); ?>" placeholder="Telephone Number" required>
                                                            </div>
                                                        </div>                   
                                                    </div>
                                                    

        <?php  if ((isset($counselor_overview) && !empty($counselor_overview)) || empty($listing_info) ) {    ?>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea  name="counselor_overview" class="form-control myinput" id="counselor_overview" rows="5" placeholder="Tell us about yourself. You can include information on your experience, expertise or credentials, and why students should choose you as their college counselor." ><?php echo (empty($counselor_overview)) ? "" : trim($counselor_overview); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                        <?php   }   ?>
                                                    <!-- <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                            <label for="staticEmail" class="d-none">Hourly Fee</label>
                                                            <input type="number" class="form-control myinput" id="fees" name="fees"  value="<?php echo (empty($counselor_fees)) ? "" : $counselor_fees; ?>" placeholder="Hourly Fee">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    

        <?php  if ((isset($description_of_services) && !empty($description_of_services)) || empty($listing_info) ) {    ?>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="inputPassword" class="d-none">Description of Services</label>
                                                                <textarea rows="5" name="description_of_services" class="form-control myinput" placeholder="Description of Services"><?php echo (empty($description_of_services)) ? "" : $description_of_services; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php  }   ?>

                                                    
            <?php if ((isset($other_services_fee) && !empty($other_services_fee)) || empty($listing_info) ) {  ?>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                          <label for="inputPassword" class="d-none">Other Information</label>
                                                                <textarea rows="5" name="other_services_fee" class="form-control myinput" placeholder="Other Information"><?php echo (empty($other_services_fee)) ? "" : $other_services_fee; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                        <?php   }    ?>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="address" class="d-none">Areas Served</label>
                                                                <input type="text" class="form-control myinput" id="area_served" name="area_served" placeholder="Areas Served" value="<?php echo (empty($area_served)) ? "" : $area_served; ?>" required>
                                                            </div>
                                                        </div>    
                                                    </div>


                                                    <div class="row upload-counselor-img">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div id="preview">
                                                                    <?php $img = (empty($profile_picture)) ? "https://img.icons8.com/color/100/000000/test-account.png" : $profile_picture; ?> <img id="previewImg" src="<?php echo $img; ?>" /> 
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="inputState" class="d-none">Upload a photo of yourself</label>
                                                                <div class="custom-file">
                                                                    <input <?= (empty($profile_picture)) ? 'required' : '' ?> id="uploadImage" class="form-control imgInp custom-file-input" type="file" accept="image/*" name="image" onchange="previewFile(this);" />
                                                                    <label class="custom-file-label" for="uploadImage">Upload a photo of yourself</label>
                                                                </div>
                                                            </div>
                                                        </div>  

                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            
                                                          <?php
                                                          $user_id = $_SESSION['userid'];

                                                         $sql1 = "SELECT * FROM counselor_detail WHERE user_id = '".$user_id."'";
                                                        $result = $con->query($sql1);
                                                       

                                                            if ($result->num_rows > 0) { ?>
                                                                 <button type="submit" class="btn mybluebtn" id="mybutton" name="save-btn"> Update Listing</button>
                                                                 <?php 
                                                            }else{ ?>
                                                                <button type="submit" class="btn mybluebtn" id="mybutton" name="save-btn">  Publish Listing</button>

                                                                <?php

                                                            }

                                                                           
                    $user_id = $_SESSION['userid'];
                    $sql2 = "SELECT * FROM counselor_detail WHERE user_id = '".$user_id."'";
                    $result2 = $con->query($sql2);
                    if($result2->num_rows > 0) {    ?>
                                                            
                        <button type="submit" class="btn float-right mybluebtn order-sm-2 mb-4 mb-sm-0" name="delete-btn">Delete Listing</button>
                    <?php  }   ?>
                                                             <!--<a class="btn float-right mybluebtn order-sm-2 mb-4 mb-sm-0" href="#">Preview Listing</a><a class="btn" href="/counselor-about.php">Next</a>-->
                                                        </div>    
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    <?php else : ?>

                                        <div class="d-sm-flex align-items-center  mb-4 mt-5 justify-content-center">
                                            <h1 class="h3 mb-0 font-weight-bold" style="color: black">Find College Counselors</h1>
                                        </div>
                                        <div class="counselor-dashboard-slider">
                                            <?php
                                            $user_id = $_SESSION['userid'];
                                            $qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' AND approval_status = 0 AND approval_status = 1";
                                            $result = $con->query($qry);
                                            $cnslrIds = array();
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $cnslrIds[] = $row['req_to_couselorID'];
                                                }
                                            }
                                            
                                            $qry1 = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' AND approval_status = 0 AND approval_status = 1";
                                            $result1 = $con->query($qry1);
                                            $cnslrIds = array();
                                            if ($result1->num_rows > 0) {
                                                while ($row1 = $result1->fetch_assoc()) {
                                                    $cnslrIds[] = $row1['req_to_couselorID'];
                                                }
                                            }
                                            
                                            
                                            
                       
                                    $sql = "SELECT * FROM `tbl_users` join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE tbl_users.usertype = 'College_Counselor' AND `tbl_users`.`is_email_verified` = 1 ";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    //echo "<pre>"; print_r($row['id']); exit;
                                                    $cnslr_id = $row['user_id'];
                                                    if (in_array($cnslr_id, $cnslrIds)) {
                                                        continue;
                                                    }
                                                    $description = $row['counselor_overview'];
                                                    $city = $row['counselor_city'];
                                                    $state = $row['counselor_state'];
                                                    $location = "";
                                                    if (!empty($city) || !empty($state)):
                                                        $location = $city . ", " . $state;
                                                    endif;

                                                    $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                                                    if (!empty($row['profile_picture'])):
                                                        $profile_picture = $row['profile_picture'];
                                                    endif;
                                                    ?>
                                                    <div class="card">
                                                        <div class=counselor-slide>

                                                            <div class="counselor-image" style="background-image:url('<?php echo $profile_picture; ?>');">
                                                                <div class="counselor-image-overlay"></div>
                                                                <!-- <img src="<?php echo $profile_picture; ?>" class="card-img-top" alt="..."> -->
                                                                <div class="counselor-info fadeIn-bottom">
                                                                    <a class="btn mybluebtn moreInfoId" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#counselorMoreInfo">More Info</a>                        

                                                                </div>
                                                            </div>
                                                            <div class="card-body text-center ">

                                                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                                                <p class="card-text">College Counselor</p> <?php //echo (empty($description)) ? "Not defined" : trim($description);     ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
        
                                            ?>

                                        </div>
                                    <?php endif; ?>




                                    <?php

                                    function checkRequestStatus($user_id, $counselor_id) {
                                        global $con;
                                        $sql = "SELECT * FROM counselor_request WHERE req_by_id = '" . $user_id . "' AND req_to_couselorID = '" . $counselor_id . "' AND (approval_status is Null OR approval_status = 0)";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            // $row = $result->fetch_assoc();
                                            // print_r($row);
                                            return 1;
                                        } else {
                                            return 0;
                                        }
                                    }
                                    ?>

                                    <?php

                                    function requestStatusCalculator($userid, $acpt, $dism, $pend) {
                                        global $con;
                                        global $usertype;
                                        if($usertype != "College_Counselor"){
                                            //$sql = "SELECT * FROM `counselor_dash_message` WHERE from_id='" . $userid . "' AND accepted='" . $acpt . "' AND dismiss='" . $dism . "'";
                                            $sql = "SELECT * FROM `counselor_request` WHERE req_by_id='" . $userid . "' AND approval_status='" . $acpt . "' AND req_dismiss='" . $dism . "'";
                                        }else{
                                            //$sql = "SELECT * FROM `counselor_dash_message` WHERE to_id='" . $userid . "' AND accepted='" . $acpt . "' AND dismiss='" . $dism . "'";
                                            $sql = "SELECT * FROM `counselor_request` WHERE req_to_couselorID='" . $userid . "' AND approval_status='" . $acpt . "' AND req_dismiss='" . $dism . "'";
                                        }
                                        $result_a = $con->query($sql);
                                        $total = 0;
                                        if ($result_a->num_rows > 0) {
                                            $total = $result_a->num_rows;
                                        }
                                        return $total;
                                    }

                                    function statusCalculator($userid, $status) {
                                        global $con;
                                        if ($_SESSION['usertype'] == 'College_Counselor') {
                                            $usertype = "req_to_couselorID";
                                        } else {
                                            $usertype = "req_by_id";
                                        }
                                        $sql = "SELECT * FROM `counselor_request` WHERE approval_status = '" . $status . "' AND " . $usertype . " = '" . $userid . "' ";
                                        if ($status == "pending") {
                                            $sql = "SELECT * FROM `counselor_request` WHERE approval_status IS NULL AND req_to_couselorID = '" . $userid . "' ";
                                        }

                                        $result_a = $con->query($sql);
                                        $total = 0;
                                        if ($result_a->num_rows > 0) {
                                            $total = $result_a->num_rows;
                                        }
                                        return $total;
                                    }
                                    ?>

                                    <?php

                                    function getCounselorDetail($cnslrIds) {
                                        global $con;
                                        $sql = "SELECT * FROM `tbl_users` inner join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE counselor_detail.user_id='" . $cnslrIds . "' ";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $row = $result->fetch_assoc();
                                            return $row;
                                        }
                                    }
                                    ?>



                                    <div class="modal fade" id="myModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="message">Subject:</label>
                                                            <input type="text" class="form-control" name="subject" value="" id="subject">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message">Message:</label>
                                                            <textarea name="message" class="form-control" id="message" rows="5" required=""></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="cnslrIds" value="" id="cnslrIds">
                                                            <button class="btn btn-info" id="sendMessage">Send</button> <br />
                                                            <span class="notification-msg"></span>
                                                        </div>


                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- end page content here -->
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                        <!-- END dashboard main content-->
                        <!-- START dashboard sidebar-->
                    </div>
                    <!-- Page footer-->
                    <?php
                    include('partials/footer.php');
                    include 'footer-dashboard.php'; 
                    ?>
                    <!-- End Page footer-->
                </div>
            </section>
        </div>
        
        <!-- =============== VENDOR SCRIPTS ===============-->
        <!-- MODERNIZR-->
        <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
        <script src="vendor/js-storage/js.storage.js"></script><!-- SCREENFULL-->
        <script src="vendor/screenfull/dist/screenfull.js"></script><!-- i18next-->
        <script src="vendor/i18next/i18next.js"></script>
        <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
        <script src="vendor/jquery/dist/jquery.js"></script>
        <script src="vendor/popper.js/dist/umd/popper.js"></script>
        <script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
        <!-- SLIMSCROLL-->
        <script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script><!-- SPARKLINE-->
        <script src="vendor/jquery-sparkline/jquery.sparkline.js"></script><!-- FLOT CHART-->
        <script src="vendor/flot/jquery.flot.js"></script>
        <script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
        <script src="vendor/flot/jquery.flot.resize.js"></script>
        <script src="vendor/flot/jquery.flot.pie.js"></script>
        <script src="vendor/flot/jquery.flot.time.js"></script>
        <script src="vendor/flot/jquery.flot.categories.js"></script>
        <script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script><!-- EASY PIE CHART-->
        <script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script><!-- MOMENT JS-->
        <script src="vendor/moment/min/moment-with-locales.js"></script><!-- =============== APP SCRIPTS ===============-->
        <script src="js/app.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick-theme.css"/>
        <script src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
        <script src="js/mycustomjs.js"></script>

        <script>
                                                                        //$(document).ready(function () {
                                                                            $('.counselor-dashboard-slider').slick(
                                                                                    {
                                                                                        dots: false,
                                                                                        infinite: true,
                                                                                        speed: 300,
                                                                                        slidesToShow: 4,
                                                                                        slidesToScroll: 1,
                                                                                        prevArrow: '<div class="arrow-counselor arrow-pre prev"><i class="fas fa-chevron-left"></i> Prev </div>',
                                                                                        nextArrow: '<div class="arrow-counselor arrow-next next">Next <i class="fas fa-chevron-right"></i></div>',
                                                                                        arrows: true,
                                                                                        responsive: [
                                                                                            {
                                                                                                breakpoint: 1024,
                                                                                                settings: {
                                                                                                    slidesToShow: 3,
                                                                                                    slidesToScroll: 1,
                                                                                                    infinite: true,
                                                                                                    //dots: true
                                                                                                }
                                                                                            },
                                                                                            {
                                                                                                breakpoint: 720,
                                                                                                settings: {
                                                                                                    slidesToShow: 2,
                                                                                                    slidesToScroll: 1
                                                                                                }
                                                                                            },
                                                                                            {
                                                                                                breakpoint: 400,
                                                                                                settings: {
                                                                                                    slidesToShow: 1,
                                                                                                    slidesToScroll: 1
                                                                                                }
                                                                                            }
                                                                                            // You can unslick at a given breakpoint now by adding:
                                                                                            // settings: "unslick"
                                                                                            // instead of a settings object
                                                                                        ]
                                                                                        
                                                                                });
                                                                     //   });
																		$(document).ready(function () {
                                                                        $(".loglinkbtn").click(function () {
                                                                            $("body").removeClass("aside-toggled");
                                                                        });     });
        </script>
        <script type="text/javascript">
            $('.moreInfoId').click(function (event) {
                //$('#counselorMoreInfo').modal('show');
                event.preventDefault();
                var counselorId = $(this).attr('id');
                var uid = '<?php echo $_SESSION["userid"]; ?>';
                $.ajax({
                    url: 'ajax_function_new.php?action=loadCounselorModel',
                    type: 'post',
                    data: {'cid': counselorId, 'uid': uid},
                    dataType: 'json',
                    beforeSend: function () {
                        // setting a timeout
                        $(".loader").css("display", "block");

                    },
                    success: function (response) {
                        console.log(response);
                        $(".loader").css("display", "none");
                        $("#counselorMoreInfo").modal("show");
                        $("#cId").attr("value",response.data.id);

                        var imgurl = "https://img.icons8.com/color/100/000000/test-account.png";
                        if(response.data.profile_picture){
                            imgurl = "https://dev.isuriz.com/"+response.data.profile_picture;
                        }

                        $("#cProfilepicture").attr("src",imgurl);
                        $("#cName").text(response.data.name);
						$("#cCity").text(response.data.counselor_city);
						$("#cState").text(response.data.counselor_state);

                        if(response.data.emailid){ 
                            $("#cEmail").text(response.data.emailid);  
                            $("#email-section").css("display","block");
                        }
                        else
                        {
                            $("#email-section").css("display","none");  
                        }
                        if (response.data.approval_status == "1") {
                             $("#email-section").show();
                        }
                        else{
                             $("#email-section").hide();
                        }

                        if(response.data.phoneno){
                            $("#cTelephone").text(response.data.phoneno);  
                            $("#phone-section").css("display","block");  
                        }
                        else
                        {
                            $("#phone-section").css("display","none");
                        }
                        
                        if (response.data.approval_status == "1") {
                             $("#phone-section").show();
                        }
                        else{
                             $("#phone-section").hide();
                        }


                        $("#cPostaladdress").text(response.data.counselor_address);

                        if(response.data.area_served){
                            $("#cAreaserved").text(response.data.area_served);
                            $("#area-served-section").css("display","block");  
                        }
                        else
                        {
                            $("#area-served-section").css("display","none");
                        }

                        if(response.data.counselor_overview){
                            $("#cOverview").text(response.data.counselor_overview);
                            $("#about_section").css("display","block");
                        }
                        else
                        {
                            $("#about_section").css("display","none");
                        }

                        if(response.data.counselor_other_services_fee){
                            $("#cDescription").text(response.data.counselor_other_services_fee);
                            $("#services_section").css("display","block");
                        }
                        else
                        {
                            $("#services_section").css("display","none");
                        }
                        

                        if(response.data.description_of_services){
                            $("#cDescriptionservices").text(response.data.description_of_services);
                            $("#information_section").css("display","block");
                        }
                        else
                        {
                            $("#information_section").css("display","none");
                        }
                        
                        if (response.data.connectId != "") {
                            $(".connectCounselorBtn").hide();
                            $(".requestedCounselorBtn").show();
                        }else{
                            $(".connectCounselorBtn").show();
                            $(".requestedCounselorBtn").hide();
                        }
                        if (response.data.approval_status == "1") {
                             $(".requestedCounselorBtn").hide();
                          $("#messageCounselor").css("display","block");
                          $("#messageCounselor").attr("data-id",response.data.uid);
                        }
                        else{
                          $("#messageCounselor").css("display","none");
                        }
                        /*$('#table_id').DataTable(); */

                        //console.log(response);
                    }
                });
            });



            /* $('#clearSearch').click( function(event) {
             event.preventDefault();
             $('form#collegeForm')[0].reset();
             console.log("Testing");
             });
             */

        </script>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="logout.php">Logout</a> </div>
                </div>
            </div>
        </div>
<!-- functions -->
<?php

function getCounselorDetails($cnslrId) {
    global $con;
    $sql = "SELECT * FROM `tbl_users` inner join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE counselor_detail.user_id='" . $cnslrId . "'  ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>

        <!-- counselor details modal popup-->
        <!-- Modal -->
        <div class="modal fade" id="counselorMoreInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-blue">
                        <h4 class="modal-title" id="exampleModalLabel">College Counselor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body py-4">
                        <div id="submitMsz" style="text-align: center;color: #019ff0;"></div>
                        <div class="counselor-profile-wrapper">
                            <div class="d-flex justify-content-between flex-column flex-md-row">
                                <div class="c-img-wrapper d-flex">
                                    <div class="mb-0 ml-2 counselorimg" >
                                        
                                        <img src="" style="width:100%;max-width: 100%;height: -webkit-fill-available;" id="cProfilepicture"  class="img-fluid" alt="User Profile"/>
                        
                                    </div>        
                                    
                               <!-- <img src="https://img.icons8.com/color/100/000000/test-account.png" class="img-fluid"> -->
                                    <div class="c-intro align-self-center">
                                    <h4 class="mb-0 ml-2" id="cName"></h4>
                                    <h4 class="mb-0 ml-2" id="cPostaladdress" id="cCity"></h4>
									<h4 class="mb-0 ml-2" id="cCity"></h4>
									<h4 class="mb-0 ml-2" id="cState"></h4>
                                    </div>
                                </div>
                                <div class="counselor-connect-btn align-self-center">                           
                                    <p class="requestedCounselorBtn" style="color:#0a0;font-size:20px;margin-right: 50px;font-weight:600;">You have a pending connection request.</p>
                                    <button type="button" class="btn mybluebtn counselorformhideshow mt-5 mt-md-0 connectCounselorBtn">Connect</button>
                                     <button type="button" data-id="" class="btn mybluebtn  mt-5 mt-md-0 messageCounselor" id="messageCounselor" style="display: none;">Message</button> 
            
                        </div>              
                            </div>
                            
                            <!-- connect form -->
                            <div class="hideshowcounselorform">

                                <form id="connectForm" class="connectForm" action="javascript:void(0);">
                                    <p>Fill out the form and send a request to connect to the college counselor.</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="inputsubject" class="d-none">Subject</label>
                                                <input type="text" class="form-control myinput" id="subjectConnect" name="Subject" placeholder="Subject">
                                                <?php $user_id = $_SESSION['userid']; ?>
                                                <input type="hidden" id="userId" name="userId" value="<?php echo $user_id; ?>">
                                                <input type="hidden" id="cId" name="cId">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="inputmessage" class="d-none">Message</label>
                                                <textarea rows="5" name="message-connect" class="form-control myinput" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-12">
                                            <button type="submit" class="btn mybluebtn"  name="connect-btn">Send</button>
                                        </div>    
                                    </div>
                                </form>
                            </div>
                            <!-- end connect form -->

        
                            <hr class="my-4">
                            <div class="c-detail-wrapper">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">                    
                                        <div class="alert alert-warning" role="alert">
                                            <small>See the contact details once you and the college counselor connect.</small>
                                        </div>

                                        <div id="phone-section" class="mb-2"><span class="cou-icon mr-2"><i class="fas fa-mobile-alt"></i></span><span class="mb-0 ml-2 m2-3" id="cTelephone"></span></div>
                                        <div id="email-section" class="mb-4"><span class="cou-icon mr-2"><i class="fas fa-envelope"></i></span><span class="mb-0 ml-2 m2-3" id="cEmail"></span></div>
                                        <div id="area-served-section">
                                            <p class="font-weight-bold mb-1">Areas Served</p>
                                            <span class="mb-0 ml-2 m2-3" id="cAreaserved"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 border-l">
                                        <div id="about_section">
                                        <p class="font-weight-bold mb-1">About</p>
                                        <span class="mb-0 ml-2 m2-3" id="cOverview"></span>
                                        </div>
                                        <div id="services_section">
                                        <p class="font-weight-bold mb-1">Services</p>
                                        <span class="mb-0 ml-2 m2-3" id="cDescription"></span>
                                        </div>
                                        <div id="information_section">
                                        <p class="font-weight-bold mb-1">Other Information</p>
                                        <span class="mb-0 ml-2 m2-3" id="cDescriptionservices"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- end counselor details modal popup -->
        <script>
            //submit connect 
            $('.connectForm').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: "ajax_function_new.php?action=connectForm",
                    type: 'post',
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function () {
                        // setting a timeout
                        $(".loader").css('display', 'block');

                    },
                    success: function (response) {
                        $(".loader").css('display', 'none');
                        $("#submitMsz").text(response.msz);
                        setTimeout(function () {
                            //$('#counselorMoreInfo').modal('hide');
                            $('form#connectForm')[0].reset();
                            //$("#submitMsz").text('');
                        }, 2000);
                    }
                });
            });

            $("#messageCounselor").click(function(){
                var url = $(this).attr("data-id");
                window.location.href=url;

            })

        </script>
        
    </body>
</html>



