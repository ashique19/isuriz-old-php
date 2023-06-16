<?php
ob_start();
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
$qry_req = "SELECT * FROM `counselor_request` WHERE req_by_id = '" . $udata[0] . "' AND req_to_couselorID='" . $userid . "'";
$result_req = $con->query($qry_req);
//print_r($result_req);
$apr = "";
if ($result_req->num_rows > 0) {
    foreach ($result_req as $r) {
        //print_r($r);
        //$qru_up = "UPDATE `counselor_request` SET req_dismiss = 1 WHERE req_id='" . $r["req_id"] . "'";
        $qru_up = "DELETE from `counselor_request` WHERE req_id='" . $r["req_id"] . "'";
        if ($con->query($qru_up)) {
            header("Location: my-student-list.php");
        } else {
            die('error!');
        }
    }
}
?>