<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('includes/config.php');
$action = $_REQUEST['action'];

if ($action == 'loadCounselorModel') {
    //print_r($_POST);
    $cid = $_POST['cid'];
    $uid = $_POST["uid"];
    $sql = "SELECT * FROM `tbl_users` join `counselor_detail` ON counselor_detail.user_id = tbl_users.id WHERE tbl_users.id = '" . $cid . "'";
    $result_n = $con->query($sql);
    $retult = $result_n->fetch_assoc();
    if (isset($retult) && !empty($retult)) {
		$Cname = $retult['name'];
		$urltk = bin2hex($retult["id"] . "_" . $Cname);
    	$murltk = "message.php?uid=" . $urltk;
		
        //$sql1 = "SELECT * FROM `counselor_dash_message` WHERE to_id = '" . $retult['id'] . "' && from_id='" . $uid . "' && dismiss=0";
        $sql1 = "SELECT * FROM `counselor_request` WHERE req_to_couselorID = '" . $retult['id'] . "' && req_by_id='" . $uid . "' && req_dismiss=0";
        $result_n1 = $con->query($sql1);
        $retult1 = $result_n1->fetch_assoc();
        //print_r($retult1);
        if (isset($retult1) && !empty($retult1)) {
            $retult["connectId"] = $retult1["req_id"];
            $retult["approval_status"] = $retult1["approval_status"];
			$retult["uid"] = $murltk;
		} else {
            $retult["connectId"] = "";
			$retult["approval_status"] = "";
			$retult["uid"] = "";
        }
    }
    if ($retult) {
        echo json_encode(array('success' => true, 'data' => $retult, 'msz' => 'Success'));
    } else {
        echo json_encode(array('success' => false, 'msz' => 'No data found'));
    }
}

if ($action == 'connectForm') {
    //print_r($_POST); exit;
    $from_id = $_POST['userId'];
    $to_id = $_POST['cId'];
    $subject = $_POST['Subject'];
    $message = $_POST['message-connect'];
    $reply_id = 0;
    $date = date("Y-m-d h:i:s");
    $sql = "INSERT INTO counselor_dash_message (from_id, to_id, message, subject, reply_id, `date`)
	VALUES ('" . $from_id . "', '" . $to_id . "', '" . $message . "', '" . $subject . "', '" . $reply_id . "', '" . $date . "' )";
    if ($con->query($sql) === TRUE) {
        $last_id = $con->insert_id;
        $sql1 = "INSERT INTO counselor_request (req_by_id, req_to_couselorID,req_msg_id)
	VALUES ('" . $from_id . "', '" . $to_id . "','".$last_id."')";
        if ($con->query($sql1) === TRUE) {
            echo json_encode(array('success' => true, 'msz' => 'Submitted Successfully...'));
        } else {
            echo json_encode(array('success' => false, 'msz' => 'Something Wrong! Please try Again'));
        }
    } else {
        echo json_encode(array('success' => false, 'msz' => 'Something Wrong! Please try Again'));
    }
}
if ($action == 'addNewMsgForm') {
    //print_r($_POST); exit;
    $from_id = $_POST['msgfromid'];
    $to_id = $_POST['msgToId'];
    $subject = $_POST['txtSub'];
    $message = $_POST['txtMsg'];
    $reply_id = 0;
    $date = date("Y-m-d h:i:s");
    $sql = "INSERT INTO counselor_dash_message (from_id, to_id, message, subject)
	VALUES ('" . $from_id . "', '" . $to_id . "', '" . $message . "', '" . $subject . "' )";
    if ($con->query($sql) === TRUE) {
            echo json_encode(array('success' => true, 'msz' => 'Submitted Successfully...'));
    } else {
        echo json_encode(array('success' => false, 'msz' => 'Something Wrong! Please try Again'));
    }
}

if ($action == 'counselorMsgForm') {
    //print_r($_POST); exit;
    $from_id = $_POST['msgfromid'];
    $to_id = $_POST['msgToId'];
    $subject = $_POST['txtSub'];
    $message = $_POST['txtMsg'];
    $reply_id = 0;
    $date = date("Y-m-d h:i:s");
    $sql = "INSERT INTO counselor_dash_message (from_id, to_id, message, subject)
	VALUES ('" . $from_id . "', '" . $to_id . "', '" . $message . "', '" . $subject . "' )";
    if ($con->query($sql) === TRUE) {
            echo json_encode(array('success' => true, 'msz' => 'Submitted Successfully...'));
    } else {
        echo json_encode(array('success' => false, 'msz' => 'Something Wrong! Please try Again'));
    }
}


if($action == 'subscription_confirmation'){
    require 'includes/class.phpmailer.php';
    $email=$_POST['email'];    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $instnm=$_POST['ids'];
    $instnm =implode(",",$instnm);
    $token=md5(rand());

    $talbe_name = '`news-feed-subscription`';
    $noti = "";

    $sql = "SELECT * FROM ".$talbe_name." WHERE email = '".$email."'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $emailConfirm = $row['isEmailConfirmed'];
        if($emailConfirm == 0){
            $noti = $email." is already registered. Please confirm your subscription";
        }else{

             $qry = "UPDATE $talbe_name SET college_ipeds='".$instnm."' WHERE id= '".$id."'";
            if ($con->query($qry) === TRUE) {     

              $noti = $email."  Your subscription for college is update";
            }

        }


      // output data of each row
       
     
    } else {
        // insert subscription detail
        $sql = "INSERT INTO $talbe_name (email, fname, lname, college_ipeds,token,isEmailConfirmed)
        VALUES ('".$email."', '".$fname."', '".$lname."','".$instnm."','".$token."','0' )";

        if ($con->query($sql) === TRUE) {          
            $message = "<html>
                    <body style='background-color:#eeeeee;padding:20px;font-family:Times New Roman;'>
                    <h1 style='color:black;'>Please Confirm Your Subscription</h1>
                    <a href='https://dev.isuriz.com/confirm.php?email=$email&token=$token'  style='font-size:18px;'>Yes, subscribe me to this list.</a>
                    <h3 style='font-weight:400'>If you received this email by mistake, simply delete it. You won't be subscribed if you don't click the confirmation link above.</h3>   
                    <h2> Thank You </h2>
                    </body>
                   </html>";

            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP();
            $mail->Host = 'mail.isuriz.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username ='support@isuriz.com';
            $mail->Password = '5Udu1t0!';
            $mail->SMTPSecure = 'ssl';

            $mail->setFrom('support@isuriz.com','isuriz');            
            $mail->AddAddress($email,'isuriz');  // Add a recipient
            // $mail->AddBCC('jlefkovi2003@yahoo.com', 'isuriz');
            
            $mail->IsHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Please Confirm Subscription';
            $mail->Body = $message;
            
            if(!$mail->send()) {
                $noti = " Mail not send ,please try again ";              
            } else {
                $noti = "<b>Almost finished...</b><br>To complete the subscription process, please click the link in the email we just sent you.</div>";
            }

            

        }      
    }

    echo $noti; 
    
}

?>