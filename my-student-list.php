<?php
include 'header-dashboard.php';
include 'header-common-dashboard.php';
//include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';
//print_r($usertype);
//print_r($userid);
?>
<style type="text/css"> 
    .result-list{
        /*display: inline-flex;*/
    }
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
    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Student List</h1> 
        </div>-->
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h4>My Student List</h4>
        </div>
    </div>
    <div class="row">   

        <div class="col-xl-12 col-md-12 mb-12">
            <!-- Counselor List -->
            <?php
            $user_id = $_SESSION['userid'];
            if( $usertype == 'Current_High_School_Student')
            {  
            //$qry = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $user_id . "' and approval_status = 1";
         $qry = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $user_id . "' ";
            //$qry = "SELECT * FROM `counselor_dash_message` WHERE to_id = '" . $user_id . "' AND dismiss != 1";
            $result = $con->query($qry);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cnslrIds = $row['req_to_couselorID'];

                    $counselor_detail = getCounselorDetail($cnslrIds);
                    //print_r($coundelor_detail);
                    $urltk = bin2hex($counselor_detail["id"] . "_" . $counselor_detail["name"]);
                    $murltk = "message.php?uid=" . $urltk;
                    //$description = $counselor_detail['counselor_overview'];
                    //$city = $counselor_detail['counselor_city'];
                   // $state = $counselor_detail['counselor_state'];
                    //$email = $counselor_detail['email'];
                   //print_r($city);
                    $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                    if (!empty($counselor_detail['profile_picture'])):
                        $profile_picture = $counselor_detail['profile_picture'];
                    endif;

                    if (!empty($city) || !empty($state)):
                        $location = $city . ", " . $state;
                    endif;
                    
                     if (!empty($counselor_detail['phoneno'])):
                        $phone = $counselor_detail['profile_picture'];
                    endif;
                    
                    ?>
       
                    <div class="col-md-12 col-sm-12 result-list">

                        <div class="row">
                            <div class="col-md-1 col-sm-6 profile-image">
                                <img src="<?php echo $profile_picture; ?>" style="width:60px;border-radius: 50px;height: 60px;"/>
                            </div>
                            
                            <div class="col-md-11 col-sm-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="widget-26-title">
                                            <span class="txt-blue"><b><?php echo ucfirst($counselor_detail['name']);?><p></p><?php echo $counselor_detail['emailid']; ?><p></p><?php echo $phone; ?></b></span>
							<p class="txt-black-01  location" style="font-size:12px;">
                            <i class="fa fa-map-marker"></i> <?php echo $location; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 widget-26-contact-info">
                                        <p>  <a data-id="<?php echo $cnslrIds; ?>" class="btn btn-primary" href="<?php echo $murltk; ?>">Message</a>
                                        </p>                                    
                                    </div> 
                                   
                                </div>              
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
        }
            else {
             $qry = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $user_id . "' AND approval_status=1 ";
              $result = $con->query($qry);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cnslrIds = $row['req_by_id'];
                     $counselor_detail = getCounselorDetail($cnslrIds);
                    //print_r($coundelor_detail);
                    $urltk = bin2hex($counselor_detail["id"] . "_" . $counselor_detail["name"]);
                    $murltk = "message.php?uid=" . $urltk;
                 //description = $counselor_detail['counselor_overview'];
                    $city = $counselor_detail['counselor_city'];
                    $state = $counselor_detail['counselor_state'];
                    //$email = $counselor_detail['email'];
                   //print_r($city);
                    $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
                    if (!empty($counselor_detail['profile_picture'])):
                        $profile_picture = $counselor_detail['profile_picture'];
                    endif;

                    if (!empty($city) || !empty($state)):
                        $location = $city . ", " . $state;
                    endif;
                    
                     if (!empty($counselor_detail['phoneno'])):
                        $phone = $counselor_detail['profile_picture'];
                    endif;
                    
                    ?>
       
                    <div class="col-md-12 col-sm-12 result-list">

                        <div class="row">
                            <div class="col-md-1 col-sm-6 profile-image">
                                <img src="<?php echo $profile_picture; ?>" style="width:60px;border-radius: 50px;height: 60px;"/>
                            </div>
                            
                            <div class="col-md-11 col-sm-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="widget-26-title">
                                            <span class="txt-blue"><b><?php echo ucfirst($counselor_detail['name']);?></b></span>
							<p class="txt-black-01  location" style="font-size:12px;">
							<?php echo $counselor_detail['emailid']; ?>
                                            </p>
                                        </div>
                                    </div>
                                     <div class="col-md-12 col-sm-12 widget-26-contact-info">
                                        <p>  <a data-id="<?php echo $cnslrIds; ?>" class="btn btn-primary" href="<?php echo $murltk; ?>">Message</a>
                                        </p>                                    
                                    </div> 
                                   
                                </div>              
                            </div>
                        </div>
                    </div>

               <?php }
           }  ?>
               <!-- <div class="row" style="border-top: 1px solid #ddd;padding:15px 0 15px;">
                    <div class="col-md-12">
                        <p>You have not accepted any student connection requests.</p>
                    </div>
                </div> -->
      <?php    }  
            ?>
        </div>

    </div>


</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>

<!-- Accept Modal -->
<div class="modal fade" id="myModalAccept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to accept the connection request?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <!--<div class="modal-body">Are you sure want to accept the request ?</div>-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="acceptReqModal.php">Accept</a> </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="myModalReject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to reject the request ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <!--<div class="modal-body">Are you sure want to accept the request ?</div>-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="rejectReqModal.php">Reject</a> </div>
        </div>
    </div>
</div>

<!-- functions -->
<?php

function getCounselorDetail($cnslrIds) {
    global $con;
    $sql = "SELECT * FROM `tbl_users` WHERE id='" . $cnslrIds . "' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>
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
<?php //include 'footer-dashboard.php';   ?>
<script>
    $("#acceptModal").click(function () {
        $("myModalAccept").modal('show');
    });
    $("#rejectModal").click(function () {
        $("myModalReject").modal('show');
    });
</script>