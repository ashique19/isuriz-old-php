<?php
include 'header-dashboard.php';
include 'header-common-dashboard.php';
//echo "<pre>";
//print_r($_REQUEST);
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$uid = hex2bin($_REQUEST["uid"]);
$udata = explode("_", $uid);
//print_r($udata);
//exit;
$apr = "";
if ($usertype == "College_Counselor") {
    $qry_req = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $udata[0] . "' AND req_to_couselorID='" . $userid . "'";
    $result_req = $con->query($qry_req);
    //print_r($result_req);
    if ($result_req->num_rows > 0) {
        foreach ($result_req as $r) {
            $to_user_msg_id = $r["req_by_id"];
            if ($r["approval_status"] > 0) {
                $apr = "approved";
            } else {
                $apr = "unapproved";
            }
        }
    }
} else {
    $to_user_msg_id = $udata[0];
    $apr = "approved";
}
?>
<style type="text/css">  
    body{
        /*display: grid;*/
    }
    .loader {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        display: none;
    }

    .message-counselor .header span.date.flot-right {
        float: right;
        font-size: 12px;
        color: #5a5c69;
    }
    .message-counselor .description {
        font-size: 15px;
    }
    .message-counselor .reply-back{
        border: 1px solid #858796;
    } 

    .alert.alert-info.replyback {
        font-style: italic;
        font-size: 15px;    
    }
    span.date_ {
        display: block;
        font-size: 11px;
    }
    .content-wrapper{
        padding: 0 20px 0;
        margin: 0;
    }
    .btn.green {
        background: #00c851;
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
    .approveblock{
        margin-top: 10px;
        padding: 0 20px 0; 
    }
    .allmessagebox{
        display: block;
        overflow-y: scroll;
        max-height: 340px;
        overflow-x: hidden; 
    }
    .form-group{
        margin-bottom: 5px;
    }
    textarea{
        max-height:70px;
    }
	
	
	 @media only screen and (max-width: 768px) {
        /* For mobile phones: */
		.col-md-1 img {
			width: 64% !important;
    		padding-left: 33%;
		}
		.col-md-12.widget-26-contact-info {
  		  	padding: 15px 45px 0 !important;
		}
	}
	
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 white" style="background:#019ff0;padding:7px 15px 0;color:#fff;">    
            <div style="border-bottom:1px solid #d0cfcf;"><h3 style="margin-bottom:3px;"><?php echo ucfirst($udata[1]); ?></h3></div>
            <span class="date flot-right" style="font-size:12px;line-height: 24px;"><?php echo $date = get_dateFormat($date2) . ' ago'; ?></span>
        </div>
    </div>
    <?php
    if ($apr == "unapproved") {
      $qry_req1 = "SELECT * FROM `counselor_dash_message` WHERE from_id = '" . $to_user_msg_id . "' AND to_id='" . $userid . "'";
        $result_req1 = $con->query($qry_req1);
        $reqSub = $reqMsg = "";
        if ($result_req1->num_rows > 0) {
            foreach ($result_req1 as $r1) {
                $date_ = $r1["date"];
                $date1 = new DateTime($date_);
                $currentDate = date('Y-m-d H:i:s');
                $date11 = new DateTime($currentDate);
                $date2 = $date1->diff($date11);
                $reqSub = $r1["subject"];
                $reqMsg = $r1["message"];
                $sql_img_query = "SELECT * from `counselor_detail` WHERE user_id ='" . $r1["from_id"] . "' ";
                $result_img_data = $con->query($sql_img_query);
                $userImg = "";
                if ($result_img_data->num_rows > 0) {
                    foreach ($result_img_data as $r2) {
                        //print_r($r2);
                        $userImg = "<img src='" . $r2["profile_picture"] . "' width='70' style='width:100%;max-height:70px'>";
                    }
                } else {
                    $userImg = "<img src='images/def_user_img.jpg' width='70' style='width:100%;max-height:70px'>";
                }
            }
        }
        ?>
        <div class="unapproveblock">
            <div class="row" style="padding-bottom:15px;">
                <div class="col-md-12 widget-26-contact-info" style="padding:15px 15px 0;">    
                    <button id="acceptModal" data-id="<?php //echo $cnslrIds;                     ?>" class="btn green mr-10" data-toggle="modal" data-target="#myModalAccept">Accept</button><button id="rejectModal" data-id="<?php //echo $cnslrIds;                     ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModalReject">Reject</button>
                </div>
            </div>
            <div class="row" style="">
                <div class="col-md-1" style="padding:5px 15px 5px;"><?php echo $userImg; ?></div>
                <div class="col-md-11" style="padding:15px 15px 0;background-color: #fff;border-radius: 15px;">    
                    <div style="border-bottom:1px solid #d0cfcf;line-height: 26px;"><p><b>Subject : </b><?php echo $reqSub; ?><span style="font-size:12px;color:#aaa;text-align:right;float:right"><?php echo get_dateFormat($date2) . " ago"; ?></span></p></div>
                    <div style="padding-top:10px;line-height: 24px; color: #656565;font-size: 15px;"><p><?php echo $reqMsg; ?></p></div>
                </div>
            </div>
        </div>
        <div style="padding:5px;background-color: #ddd;margin-top: 10px;margin-bottom: 0px">
            <form class="addNewMsg" id="addNewMsg" action="javascript:void(0);" style="margin-bottom:0px;">
                <input type="hidden" name="msgfromid" id="msgfromid" value="<?php echo $userid; ?>" >
                <input type="hidden" name="msgToId" id="msgToId" value="<?php echo $udata[0]; ?>" >
                <div class="form-group" style="margin-bottom: 0px;">
                    <input class="form-control form-control" type="text" name="txtSub" placeholder="Enter Subject Here.." />
                </div>
                <div class="form-group" style="padding-top:5px;margin-bottom: 0px;">
                    <textarea class="form-control form-control" rows="2" type="text" name="txtMsg" placeholder="Enter Your Message Here.."></textarea>
                </div>
                <div class="form-group" style="padding-top:5px;margin-bottom: 0px;">
                    <input class="btn btn-primary" type="submit" value="submit" />
                </div>
            </form>
        </div>
    <?php } else {
        ?>
        <div class="allmessagebox" id="allmessagebox">
             <div class="approveblock">
                        <div class="row" style="">
            <?php
                        $reqSub = $reqMsg = $fromID = "";

             $qry_req1 = "SELECT * FROM `counselor_dash_message` WHERE to_id='" . $userid . "' AND from_id = '" .$to_user_msg_id . "' OR from_id='" . $userid . "' AND to_id = '" .$to_user_msg_id . "'  ORDER BY date ASC";
            $result_req1 = $con->query($qry_req1);
            if ($result_req1->num_rows > 0) {
                foreach ($result_req1 as $r1) {

                     $date_ = $r1["date"];
                                $date1 = new DateTime($date_);
                                $currentDate = date('Y-m-d H:i:s');
                                $date11 = new DateTime($currentDate);
                                $date2 = $date1->diff($date11);
                                //echo $date2->format('%R%a days');
								//echo $date2 = date_diff($date1,$date11);
                                $fromID = $r1["from_id"];
								$toID = $r1["to_id"];
                                $reqSub = $r1["subject"];
                                $reqMsg = $r1["message"];

                 $sql="SELECT * FROM `tbl_users` WHERE id ='" . $fromID . "' ";
                   
                $result = $con->query($sql);
                 $fromName = $fromEmail = "";
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $fromName = $row['name'];
                  $fromEmail = $row['emailid'];
                }              
                        ?>
                              
                            <div style="padding-top:10px;line-height: 24px; color: #656565;font-size: 15px; border-top: 2px solid"><p><b>Name : </b><?php echo $fromName; ?><b style="padding-left: 10px;">Email : </b><?php echo $fromEmail; ?></p></div>

                            <div class="col-md-11" style="padding:15px 15px 0;background-color: #fff;border-radius: 15px;">  
                                <div style="line-height: 26px;"><p><b>Subject : </b><?php echo $reqSub; ?><span style="font-size:12px;color:#aaa;text-align:right;float:right"><?php echo get_dateFormat($date2) . " ago"; ?></span></p></div>
                                <div style="padding-top:10px;line-height: 24px; color: #656565; font-size: 15px;"><p><b>Message : </b><?php echo $reqMsg; ?></p></div>
                            </div>
                      
                            <?php
                        }
                    }
            
            ?> 
            </div>
        </div>          </div>

        <div style="padding:5px;background-color: #ddd;margin-top: 10px;margin-bottom: 0px">
            <form class="addNewMsg" id="addNewMsg" action="javascript:void(0);" style="margin-bottom:0px;">
                <input type="hidden" name="msgfromid" id="msgfromid" value="<?php echo $userid; ?>" >
                <input type="hidden" name="msgToId" id="msgToId" value="<?php echo $udata[0]; ?>" >
                <div class="form-group" style="margin-bottom: 0px;">
                    <input class="form-control form-control" type="text" name="txtSub" placeholder="Enter Subject Here.." />
                </div>
                <div class="form-group" style="padding-top:5px;margin-bottom: 0px;">
                    <textarea class="form-control form-control" rows="2" type="text" name="txtMsg" placeholder="Enter Your Message Here.."></textarea>
                </div>
                <div class="form-group" style="padding-top:5px;margin-bottom: 0px;">
                    <input class="btn btn-primary" type="submit" value="submit" />
                </div>
            </form>
        </div>
                    
        
    <?php } ?>

</div>
<!-- /.container-fluid -->
<!--
</div>
 End of Main Content
</div> -->

<!-- Accept Modal -->
<div class="modal fade" id="myModalAccept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to accept the connection request?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <?php
            $reqacpturl = "acceptReqModal.php?uid=" . $_REQUEST["uid"];
            ?>
            <!--<div class="modal-body">Are you sure want to accept the request ?</div>-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="<?php echo $reqacpturl; ?>">Accept</a> </div>
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
            <?php
            $reqrejecturl = "rejectReqModal.php?uid=" . $_REQUEST["uid"];
            ?>

            <!--<div class="modal-body">Are you sure want to accept the request ?</div>-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="<?php echo $reqrejecturl; ?>">Reject</a> </div>
        </div>
    </div>
</div>



<?php

function get_dateFormat($date2) {
	if (!empty($date2->s)) {
        $res_date = $date2->s . ' seconds';
    }
	if (!empty($date2->i)) {
        $res_date = $date2->i . ' minutes';
    }	
    	if (!empty($date2->h)) {
        $res_date = $date2->h . ' hours';
    }
	if (!empty($date2->d)) {
        $res_date = $date2->d . ' days';
    }
	if (!empty($date2->m)) {
        $res_date = $date2->m . ' months';
    }
	if (!empty($date2->y)) {
        $res_date = $date2->y . ' years';
    }
    return $res_date;
}

function getUserInfo($userid) {
    global $con;
    $sql = "SELECT * FROM `tbl_users` WHERE id = '" . $userid . "' ";
    $result_n = $con->query($sql);
    $row = array();
    if ($result_n->num_rows > 0) {
        $row = $result_n->fetch_assoc();
    }
    return $row;
}

function checkReply($id) {
    global $con;
    $qry = "SELECT * FROM `counselor_dash_message` WHERE reply_id = '" . $id . "'";
    $result_n = $con->query($qry);
    $total_replay = 0;
    if ($result_n->num_rows > 0) {
        $total_replay = $result_n->num_rows;
    }
    return $total_replay;
}

function replySubject($reply_id) {
    global $con;
    $qry = "SELECT subject FROM `counselor_dash_message` WHERE id = '" . $reply_id . "'";
    $result_n = $con->query($qry);
    $total_replay = 0;
    if ($result_n->num_rows > 0) {
        $row = $result_n->fetch_assoc();
    }
    return $row;
}

function replyMessage($reply_id) {
    global $con;
    $qry = "SELECT * FROM `counselor_dash_message` WHERE reply_id = '" . $reply_id . "' ORDER BY `counselor_dash_message`.`Id` DESC";
    $result_n = $con->query($qry);
    $total_replay = 0;
    $message = array();
    if ($result_n->num_rows > 0) {
        while ($row = $result_n->fetch_assoc()) {
			
            array_push($message, $row['message']);
        }
    }
    return $message;
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
<script>
    $("#acceptModal").click(function () {
        $("myModalAccept").modal('show');
    });
    $("#rejectModal").click(function () {
        $("myModalReject").modal('show');
    });
    $('.addNewMsg').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "ajax_function_new.php?action=addNewMsgForm",
            type: 'post',
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                // setting a timeout
                $(".loader").css('display', 'block');

            },
            success: function (response) {
                $(".loader").css('display', 'none');
//                console.log(response);
//                setTimeout(function () {
                //$('#counselorMoreInfo').modal('hide');
                $('.addNewMsg')[0].reset();
                //$("#submitMsz").text('');
//                }, 2000);
                location.reload();

            }
        });
    });
    var messageBody = document.querySelector('#allmessagebox');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
</script>
<?php
//include 'footer-dashboard.php'; ?>