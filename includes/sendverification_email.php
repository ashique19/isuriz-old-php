<?php
include('config.php');
require 'class.phpmailer.php';

function encrypt_decrypt($action, $string) {
  $output = false;

  $encrypt_method = "AES-256-CBC";
  $secret_key = 'X*T9B@786#!qwN';
  $secret_iv = 'V)*12qZesxd%^jK';

  // hash
  $key = hash('sha256', $secret_key);
  
  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if ( $action == 'encrypt' ) {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if( $action == 'decrypt' ) {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  else{
    
  }
  return $output;
}
$id= $_POST['id'];
  $resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE id = '$id' ");
  //echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
  //check if the user exists as well as email verified flag is set
 while($row = mysqli_fetch_array($resdup2)){
	$name = $row['name'];
	$emailid = $row['emailid'];
	$password = $row['password'];
	$password = encrypt_decrypt('decrypt', $password);
	$token = $row['token'];
	
	$message = 'Hello '.$name.',<br/><br/>We are excited to welcome you to Isuriz. You have joined one of the most dynamic and innovative websites for college planning. We hope that you realize the benefits.<br/><br/>Here are your account details for your review:<br/>Username: '.$emailid.'<br/>Password: '.$password.'<br/><br/>To activate your Isuriz account, click on the following link:<br/><a href="'.URL.'verfication.php?token='.$token.'&id='.$id.'">'.URL.'verfication.php?token='.$token.'&id='.$id.'</a>'.'<br/><br/>Regards,<br/>The Isuriz Team';
	$mail = new PHPMailer(); // create a new object
	//$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	//$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$mail->Host = "mail.isuriz.com";
	$mail->Username = "support@isuriz.com"; // SMTP username
	$mail->Password = "3G5n2~nq"; // SMTP password
	$mail->SMTPSecure = "ssl";
	$mail->Port       = 25;                            // SMTP password
	$mail->setFrom('support@isuriz.com', 'Isuriz');
	$mail->AddAddress($emailid, $name);  // Add a recipient
	$mail->AddBCC('jlefkovi2003@yahoo.com', 'Jay Lefkovitz');
	//$mail->AddAddress($row->emailid, $row->name);               // Name is optional

	$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
	$mail->IsHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Welcome to Isuriz';
	$mail->Body = $message;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	if(!$mail->send()) {
		echo " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while sending email!!!</div>";				
	} else {
		echo " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your account has been created successfully. A confirmation email has been sent to you. Click on the link in the email to activate your account and get started!</div>";
	}
}
include('close.php');
?>