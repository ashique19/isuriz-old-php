<?php
include 'header-dashboard.php';
include 'header-common-dashboard.php';
//include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';
//print_r($userid);
?>
<style type="text/css"> 
    .widget-26-contact-info .btn{
        padding: 5px 5px !important;
        border: 0px;
        min-width: 100px;
        color: #fff;
        border-radius: 5px;
        margin-right: 10px;
        margin-bottom: 5px;

    }
    .btn.yellow {
        background: #e5c300;
    }
    .btn.green {
        background: #00c851;
    }
    .widget-26-contact-info {

        padding-top: 5px;
    }


    .result-list {
        border-top: 1px solid #ddd;
        padding: 10px 20px;
    }
    .result-list:hover {
        background: #9e9e9e0a;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
    }
    .txt-blue{
        color: #019ff0;
    }

    .txt-black-01{
        font-weight: 600;
        color: #3a3a3a;
    }



    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .result-list {
            text-align: center;    
        }
        .widget-26-contact-info {      
            padding-top: 10px;
        }

    }
    .modal-dialog {
        margin: 7rem auto;
    }

</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4>My College Counselors</h4>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">   
        <div class="col-xl-12 col-md-12 mb-12">
            <!-- Counselor List -->
            <?php
            if( $usertype == 'Current_High_School_Student')  {
            $user_id = $_SESSION['userid'];
            //$qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' and approval_status = 1";
            $qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' AND approval_status=1";
            //$qry = "SELECT * FROM `counselor_dash_message` WHERE from_id = '" . $user_id . "' AND dismiss != 1";
            $result = $con->query($qry);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cnslrIds = $row['req_to_couselorID'];

                    $coundelor_detail = getCounselorDetail($cnslrIds);
                    //print_r($coundelor_detail);
                    $urltk = bin2hex($coundelor_detail["id"] . "_" . $coundelor_detail["name"]);
                    $murltk = "message.php?uid=" . $urltk;
                    $description = $coundelor_detail['counselor_overview'];
                    $city = $coundelor_detail['counselor_city'];
                    $state = $coundelor_detail['counselor_state'];
                    //print_r($row);
                    $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                    if (!empty($coundelor_detail['profile_picture'])):
                        $profile_picture = $coundelor_detail['profile_picture'];
                    endif;

                    if (!empty($city) || !empty($state)):
                        $location = $city . ", " . $state;
                    endif;
                    ?>
                    <div class="col-md-12 col-sm-12 result-list">
                        <div class="row">
                            <div class="col-md-1 col-sm-12 profile-image">
                                <img src="<?php echo $profile_picture; ?>" style="width:60px;border-radius: 50px;height: 60px;"/>
                            </div>
                            <div class="col-md-11 col-sm-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-9">
                                        <div class="widget-26-title">
                                            <span class="txt-blue"><b><?php echo ucfirst($coundelor_detail['name']); ?></b></span>
                                            <p class="txt-black-01  location" style="font-size:12px;">
                                                <i class="fa fa-map-marker"></i> <?php echo $location; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 widget-26-contact-info">
                                        <p>  
                                            <!-- <button id="acceptModal" data-id="<?php //echo $cnslrIds;          ?>" class="btn green mr-10" data-toggle="modal" data-target="#myModalAccept">Accept</button><button id="rejectModal" data-id="<?php //echo $cnslrIds;          ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModalReject">Reject</button><button data-id="<?php //echo $cnslrIds;          ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModalMessage">Message</button> -->
                                            <a data-id="<?php echo $cnslrIds; ?>" class="btn btn-primary" href="<?php echo $murltk; ?>">Message</a>
                                        </p>                                    
                                    </div>
                                </div>              
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{ ?>
                <div class="row" style="border-top: 1px solid #ddd;padding:15px 0 15px;">
                    <div class="col-md-12">
                        <p>You have not any college counselor connections.</p>
                    </div>
                </div>
            <?php } 
        }   else    {
            $user_id = $_SESSION['userid'];
            //$qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' and approval_status = 1";
           $qry = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $user_id . "' AND approval_status=1";
            //$qry = "SELECT * FROM `counselor_dash_message` WHERE from_id = '" . $user_id . "' AND dismiss != 1";
            $result = $con->query($qry);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cnslrIds = $row['req_by_id'];

                    $coundelor_detail = getCounselorDetail($cnslrIds);
                    //print_r($coundelor_detail);
                    $urltk = bin2hex($coundelor_detail["id"] . "_" . $coundelor_detail["name"]);
                    $murltk = "message.php?uid=" . $urltk;
                    $description = $coundelor_detail['counselor_overview'];
                    $city = $coundelor_detail['counselor_city'];
                    $state = $coundelor_detail['counselor_state'];
                    //print_r($row);
                    $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                    if (!empty($coundelor_detail['profile_picture'])):
                        $profile_picture = $coundelor_detail['profile_picture'];
                    endif;

                    if (!empty($city) || !empty($state)):
                        $location = $city . ", " . $state;
                    endif;
                    ?>
                    <div class="col-md-12 col-sm-12 result-list">
                        <div class="row">
                            <div class="col-md-1 col-sm-12 profile-image">
                                <img src="<?php echo $profile_picture; ?>" style="width:60px;border-radius: 50px;height: 60px;"/>
                            </div>
                            <div class="col-md-11 col-sm-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-9">
                                        <div class="widget-26-title">
                                            <span class="txt-blue"><b><?php echo ucfirst($coundelor_detail['name']); ?></b></span>
                                            <p class="txt-black-01  location" style="font-size:12px;">
                                                <i class="fa fa-map-marker"></i> <?php echo $location; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 widget-26-contact-info">
                                        <p>  
                                            <!-- <button id="acceptModal" data-id="<?php //echo $cnslrIds;          ?>" class="btn green mr-10" data-toggle="modal" data-target="#myModalAccept">Accept</button><button id="rejectModal" data-id="<?php //echo $cnslrIds;          ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModalReject">Reject</button><button data-id="<?php //echo $cnslrIds;          ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModalMessage">Message</button> -->
                                            <a data-id="<?php echo $cnslrIds; ?>" class="btn btn-primary" href="<?php echo $murltk; ?>">Message</a>
                                        </p>                                    
                                    </div>
                                </div>              
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{ ?>
                <div class="row" style="border-top: 1px solid #ddd;padding:15px 0 15px;">
                    <div class="col-md-12">
                        <p>You have not any college counselor connections.</p>
                    </div>
                </div>
            <?php } 
        }
            ?>
        
        </div>

    </div>

</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->




<!-- functions -->
<?php

function getCounselorDetail($cnslrIds) {
    global $con;
    $sql = "SELECT * FROM `tbl_users` join counselor_detail on counselor_detail.user_id = tbl_users.id WHERE counselor_detail.user_id='" . $cnslrIds . "' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>

<?php //include 'footer-dashboard.php';  ?>
<script src="vendor/jquery/dist/jquery.js"></script>
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